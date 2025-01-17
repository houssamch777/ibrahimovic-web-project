<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\FeaturedProject;
use App\Models\GalleryImage;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index(Request $request)
    {
        // جلب المشاريع مع الفلاتر إذا وجدت
        $projects = Project::query();

        // البحث حسب الاسم أو الوصف
        if ($request->filled('search')) {
            $search = $request->input('search');
            $projects->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        }

        // الفلترة حسب الفئة
        if ($request->filled('category')) {
            $projects->where('category', $request->input('category'));
        }

        // الفلترة حسب الحالة
        if ($request->filled('status')) {
            $projects->where('status', $request->input('status'));
        }

        // ترتيب المشاريع حسب الإضافة (الافتراضي من الأحدث إلى الأقدم)
        $projects->orderBy('created_at', 'desc');

        // استخدام التصفية وتقسيم النتائج إلى صفحات
        $projects = $projects->paginate(10);

        $projectsCount = Project::count();
        $completedCount = Project::where('status', 'مكتمل')->count();
        $inProgressCount = Project::where('status', 'قيد التنفيذ')->count();        // عرض صفحة المشاريع مع البيانات
        return view('admin.projects.index', compact('projects', 'projectsCount', 'completedCount', 'inProgressCount'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
        // التحقق من المدخلات
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'nullable|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'end_date' => 'nullable|date',
            'is_featured' => 'required|boolean',
            'main-image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        

        // الحصول على اسم المشروع لإنشاء مجلد مخصص
        $projectName = Str::slug($request->input('name'), '-'); // تحويل الاسم إلى صيغة صالحة للمجلد
        // رفع الصورة الرئيسية للمشروع إلى مجلد يحمل اسم المشروع
        $mainImage = $request->file('main-image');
        $mainImagePath = $mainImage->store("projects/{$projectName}", 'public');

        // الحصول على معرف المستخدم الحالي
        $userId = Auth::id();

        // إنشاء المشروع
        $project = Project::create([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'budget' => $request->input('budget'),
            'location' => $request->input('location'),
            'end_date' => $request->input('end_date'),
            'is_featured' => $request->input('is_featured'),
            'image_url' => $mainImagePath, // حفظ مسار الصورة الرئيسية
            'images' => [], // يبدأ الحقل images كمصفوفة فارغة
            'created_by' => $userId, // تخزين معرف المستخدم الذي قام بإنشاء المشروع
        ]);

        // إضافة الصور الأخرى للمشروع
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store("projects/{$projectName}", 'public');
                $imagePaths[] = $imagePath;
            }
            // تحديث حقل images في المشروع
            $project->update([
                'images' => $imagePaths
            ]);
        }

        // إعادة التوجيه مع رسالة النجاح
        return redirect()->route('admin.projects.index')->with('success', 'تم إضافة المشروع بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // العثور على المشروع باستخدام المعرف
        $project = Project::findOrFail($id);
        // الحصول على اسم المجلد المرتبط بالمشروع باستخدام اسم المشروع
        $projectName = Str::slug($project->name);

        // حذف المجلد بالكامل (بما في ذلك جميع الصور داخله)
        Storage::disk('public')->deleteDirectory("projects/{$projectName}");
        // حذف المشروع
        $project->delete();

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.projects.index')->with('success', 'تم حذف المشروع بنجاح!');
    }
}
