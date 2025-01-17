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
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.donation',compact('contact','recentPosts'));
    }
}
