<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    //
    public function index(){
        $contact = Contact::first();
        $footerRecentPosts = Post::orderBy('created_at', 'desc')->take(2)->get();
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.donation',compact('contact','footerRecentPosts','recentPosts'));
    }
}
