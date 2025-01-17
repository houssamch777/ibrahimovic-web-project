<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = $request->input('query');
        return response()->json([
            'message' => $query
        ], 200);        

    }
}
