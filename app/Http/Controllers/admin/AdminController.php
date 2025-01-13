<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteVisitor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function index()
    {
        $visitorsCount = SiteVisitor::count();
        return view('admin.index', compact('visitorsCount'));
    }
    public function updateProfile(Request $request)
    {
        
        $request->validate([
            'cropped_image' => 'required',
        ]);
        
        $user = auth()->user();
        $data = $request->input('cropped_image');

        // Decode the base64 string
        $image = str_replace('data:image/png;base64,', '', $data);
        $image = str_replace(' ', '+', $image);

        // Generate a unique name for the image (UUID + timestamp)
        $imageName = str::uuid() . '_' . time() . '.png';

        // Save the image to storage (using public disk, or any other configured disk)
        Storage::disk('public')->put('profile_images/' . $imageName, base64_decode($image));

        // Build the full image path
        $imagePath = 'profile_images/' . $imageName;
        
        // Check if the user already has a profile picture
        if ($user->profile_picture) {
            // Delete the old profile picture from storage
            if (Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }
        }
        // Update the profile picture path in the user's profile
        $user->profile_picture = $imagePath;
        $user->save();  // Save the updated user with the new profile picture path

        return back()->with('success', 'Profile picture updated successfully.');
    }

}
