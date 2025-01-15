<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\President;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PresidentController extends Controller
{
    //
    public function edit()
    {
        $president = President::first();
        return view('admin.president', compact('president'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'achievements' => 'nullable|array',
            'description' => 'nullable|string',
            'speech' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'social_links' => 'nullable|array',
        ]);
        //dd($request->input());
        $president = President::firstOrCreate([]);

        // تحديث الصورة
        if ($request->hasFile('image')) {
            if ($president->image) {
                Storage::delete($president->image);
            }
            $president->image = $request->file('image')->store('president_images');
        }

        // تحديث البيانات
        $president->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'achievements' => $request->achievements,
            'description' => $request->description,
            'speech' => $request->speech,
            'social_links' => $request->social_links,
        ]);

        return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح.');
    }
}
