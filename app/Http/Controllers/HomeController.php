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
        $projects = Project::where('is_featured', true) // اختيار المشاريع المميزة
            ->orderBy('created_at', 'desc') // ترتيبها تنازليًا حسب تاريخ الإنشاء
            ->take(6) // اختيار أول 6 مشاريع فقط
            ->get();
        
        $contact = Contact::first();
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();


        return view('welcome',compact('Images','project','projects','recentPosts','contact','footerRecentPosts'));
    }
    public function aboutCharity()
    {
        $contact = Contact::first();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

        return view('pages.about-us',compact('contact', 'footerRecentPosts'));
    }
    public function contact(){
        $contact = Contact::first();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

        return view('pages.contact',compact('contact', 'footerRecentPosts'));
    }
    public function vision(){
        $contact = Contact::first();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

        return view('pages.vision',compact('contact', 'footerRecentPosts'));
    }
    public function president()
    {
        $contact = Contact::first();
        $president = President::first();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

        return view('pages.president', compact('contact','president', 'footerRecentPosts'));
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
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.project.index', compact('contact','projects', 'footerRecentPosts','categories','locations','recentPosts'));
    }
    public function projectDetails($id)
    {
        $project = Project::findOrFail($id);
        $contact = Contact::first();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();


        return view('pages.project.details', compact('contact','project', 'footerRecentPosts'));
    }
    public function branches()
    {
        $contact = Contact::first();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

        return view('pages.branches', compact('contact', 'footerRecentPosts'));
    }
    public function posts()
    {
        $contact = Contact::first();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        return view('pages.post.index', compact('contact','posts', 'recentPosts', 'footerRecentPosts'));
    }


        public function postsDetails($id)
    {
        $post = Post::findOrFail($id);
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $contact = Contact::first();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();

        return view('pages.post.details', compact('contact','post','recentPosts', 'footerRecentPosts'));
    }



    public function volunteer()
    {
        $contact = Contact::first();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();


        return view('pages.volunteer', compact('contact', 'footerRecentPosts'));
    }
}
