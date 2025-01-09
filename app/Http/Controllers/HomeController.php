<?php

namespace App\Http\Controllers;

use App\Models\FeaturedProject;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $Images = GalleryImage::get();
        $project = FeaturedProject::first();
        return view('welcome',compact('Images','project'));
    }
}
