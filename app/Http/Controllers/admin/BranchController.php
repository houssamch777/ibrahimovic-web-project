<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    //
    public function index(){
        return view('admin.branch.index');
    }
    public function create()
    {
        return view('admin.branch.create');
    }
    public function store(Request $request){

        dd($request->input());
    }
}
