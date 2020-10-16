<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CMSAbout;

class AboutUsController extends Controller
{
    public function index(){
        $contact = CMSAbout::all();
        return view('admin.pages.list-contact', [
        'contact' => $contact, 
        ]);
    }
}
