<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OneLoft extends Controller
{
    public function index()
    {
        return view('one_loft_race.pages.one_loft');
    }
}
