<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\FeaturedProject;
use App\Models\GalleryImage;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $Images = GalleryImage::get();
        $project = FeaturedProject::first();
        $contact = Contact::first();

        return view('welcome',compact('Images','project','contact'));
    }
    public function aboutCharity()
    {
        $contact = Contact::first();
        return view('pages.about-us',compact('contact'));
    }
    public function contact(){
        $contact = Contact::first();
        return view('pages.contact',compact('contact'));
    }
    public function vision(){
        $contact = Contact::first();
        return view('pages.vision',compact('contact'));
    }

    public function projects(){
        $contact = Contact::first();
        $projects = Project::paginate(6);
        $categories = Project::select('category', \DB::raw('COUNT(*) as count'))
            ->groupBy('category')
            ->get();
        return view('pages.project.index', compact('contact','projects','categories'));
    }
    public function projectDetails($id)
    {
        $project = Project::findOrFail($id);
        $contact = Contact::first();

        return view('pages.project.details', compact('contact','project'));
    }
    public function branches()
    {
        $contact = Contact::first();
        return view('pages.branches', compact('contact'));
    }
    public function posts()
    {
        $contact = Contact::first();
        $posts = Post::paginate(6);
        return view('pages.post.index', compact('contact','posts'));
    }


        public function postsDetails($id)
    {
        $post = Post::findOrFail($id);
        $contact = Contact::first();
        return view('pages.post.details', compact('contact','post'));
    }
}
