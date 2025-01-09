<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteVisitor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $visitorsCount = SiteVisitor::count();
        return view('admin.index', compact('visitorsCount'));
    }
}
