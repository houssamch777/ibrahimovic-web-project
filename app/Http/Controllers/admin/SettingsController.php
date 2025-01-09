<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedProject;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function index()
    {
        $images = GalleryImage::all();
        $project = FeaturedProject::first();
        return view('admin.settings', compact('images','project'));
    }
    public function galleryStore (Request $request) {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image_url')->store('gallery_images', 'public');

        GalleryImage::create([
            'title' => $request->input('title'),
            'image_url' => $path,
        ]);

        return redirect()->back()->with('success', 'تمت إضافة الصورة بنجاح!');
    }
    public function galleryDestroy($id)
    {
        $image = GalleryImage::findOrFail($id);
        // حذف الصورة من التخزين
        if (file_exists(public_path('storage/' . $image->image_url))) {
            unlink(public_path('storage/' . $image->image_url));
        }

        // حذف السجل من قاعدة البيانات
        $image->delete();

        return redirect()->back()->with('success', 'تم حذف الصورة بنجاح!');
    }
    public function updateProject(Request $request){
        $project = FeaturedProject::first();
        $project->update($request->all());
        return redirect()->back()->with('success', 'تم تحديث المشروع المثبت بنجاح!');
    }
}
