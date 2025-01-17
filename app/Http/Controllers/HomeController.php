<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\FeaturedProject;
use App\Models\GalleryImage;
use App\Models\Post;
use App\Models\President;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function president()
    {
        $contact = Contact::first();
        $president = President::first();
        return view('pages.president', compact('contact','president'));
    }

    public function projects(){
        $contact = Contact::first();
        $projects = Project::orderBy('created_at', 'desc')->paginate(4);

        $categories = Project::select('category', DB::raw('COUNT(*) as count'))
            ->groupBy('category')
            ->limit(3)->get();
        $locations = Project::select('location', DB::raw('COUNT(*) as count'))
            ->groupBy('location')
            ->limit(3)->get();
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.project.index', compact('contact','projects','categories','locations','recentPosts'));
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
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        return view('pages.post.index', compact('contact','posts', 'recentPosts'));
    }


        public function postsDetails($id)
    {
        $post = Post::findOrFail($id);
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $contact = Contact::first();
        return view('pages.post.details', compact('contact','post','recentPosts'));
    }



    public function familypledge()
{

    
}
}
