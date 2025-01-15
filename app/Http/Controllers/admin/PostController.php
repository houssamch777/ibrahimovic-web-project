<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //
    public function index(){
        // Retrieve all posts, with pagination (10 posts per page)
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $totalPosts = Post::count();
        $videoPosts = Post::where('type', 'video')->count();
        $imagePosts = Post::where('type', 'image')->count();

        // Pass the posts to the view
        return view('admin.post.index', compact('posts','totalPosts', 'videoPosts', 'imagePosts'));
    }
    public function createVideo()
    {
        return view('admin.post.create-one');
    }
    public function createImage()
    {
        return view('admin.post.create-two');
    }
    public function store(Request $request)
    {

        //dd($request->allFiles());
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:video,image',
            'video_url' => 'required_if:type,video|url',
            'image' => 'required_if:type,image|image|mimes:jpeg,png,jpg,gif',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];

        // الرسائل
        $messages = [
            'title.required' => 'يرجى إدخال عنوان المنشور.',
            'title.string' => 'يجب أن يكون العنوان نصياً.',
            'title.max' => 'يجب ألا يزيد العنوان عن 255 حرفاً.',
            'type.required' => 'يرجى اختيار نوع المنشور.',
            'type.in' => 'النوع المختار غير صالح.',
            'video_url.required_if' => 'يرجى إدخال رابط الفيديو إذا كان نوع المنشور فيديو.',
            'video_url.url' => 'يجب أن يكون رابط الفيديو صالحاً.',
            'image.required_if' => 'يرجى تحميل صورة إذا كان نوع المنشور صور.',
            'image.image' => 'يجب أن يكون الملف صورة.',
            'image.mimes' => 'يجب أن تكون الصورة بامتداد: jpeg, png, jpg, gif.',
            'image.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميجابايت.',
            'images.*.image' => 'يجب أن يكون الملف صورة.',
            'images.*.mimes' => 'يجب أن تكون الصور بامتداد: jpeg, png, jpg, gif.',
            'images.*.max' => 'يجب ألا يتجاوز حجم الصور 2 ميجابايت.',
        ];

        // التحقق من الطلب
        $validatedData = $request->validate($rules, $messages);

        $post = Post::create([
            'title' => $validatedData['title'],
            'type' => $validatedData['type'],
            'description' => $validatedData['description'] ?? null,
            'image'=>'',
            'images' => [], // يبدأ الحقل images كمصفوفة فارغة
            'created_by' => auth()->id(), // تخزين معرف المستخدم الذي قام بإنشاء المشروع
        ]);




        if ($validatedData['type'] === 'video') {
            // معالجة الفيديو
            $video_url = $validatedData['video_url'];
            $post->update([
                'video_url' => $video_url
            ]);
        } elseif ($validatedData['type'] === 'image') {
            // معالجة الصور
            // Generate a unique folder name for the post
            $uniqueFolder = 'posts/' . Str::uuid();
            if ($request->hasFile('image')) {
                $mainImage = $request->file('image')->store($uniqueFolder, 'public');
                $post->update([
                    'image' => $mainImage
                ]);
            }

            if ($request->hasFile('images')) {
                $images = [];
                foreach ($request->file('images') as $image) {
                    $images[] = $image->store($uniqueFolder, 'public');
                }
                $post->update([
                    'images' => $images
                ]);
            }
        }


        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.posts.index')->with('success', 'تم إنشاء المنشور بنجاح!');
    }
    public function destroy(Post $post)
    {
        // Delete the folder containing the images if it exists
        if ($post->type === 'image') {
            $folderPath = dirname($post->image); // Get the folder path from the main image
            Storage::disk('public')->deleteDirectory($folderPath);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'تم حذف المنشور بنجاح');
    }
}
