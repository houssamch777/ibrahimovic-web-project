<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
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
        $contact = Contact::first();
        return view('admin.settings', compact('images','project','contact'));
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

    public function updateContact(Request $request)
    {
        // Validation rules
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'alt_phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'google_map' => 'nullable|url',
            'working_hours' => 'nullable|string|max:255',
            'facebook' => 'nullable|url',
            'youtube' => 'nullable|url',
            'telegram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
        ]);

        // Fetch the last contact record (or create a new one if none exists)
        $contact = Contact::latest()->first() ?? new Contact();

        // Update contact fields with form data
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->alt_phone = $request->alt_phone;
        $contact->email = $request->email;
        $contact->google_map = $request->google_map;
        $contact->working_hours = $request->working_hours;

        // Social media links
        $contact->facebook = $request->facebook;
        $contact->youtube = $request->youtube;
        $contact->telegram = $request->telegram;
        $contact->tiktok = $request->tiktok;
        $contact->instagram = $request->instagram;
        $contact->twitter = $request->twitter;

        // Save updated contact record
        $contact->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'تم تحديث معلومات الاتصال بنجاح.');
    }
}
