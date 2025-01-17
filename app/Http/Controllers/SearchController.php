<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function post(Request $request)
    {

        $query = $request->input('query');

        $posts = Post::where('title', 'LIKE', "%$query%")
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get(['id', 'title', 'created_at', 'image', 'video_url', 'type']);

        return response()->json($posts);


    }
}
