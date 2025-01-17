<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class PledgeController extends Controller
{
    //
    public function index()
    {
        $contact = Contact::first();
        return view('pages.family_pledge',compact('contact'));
    }
}
