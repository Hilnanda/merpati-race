<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMSFooter;
use App\CMSMedsos;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        return view('pages.home',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer
            ]);

    }
    
}
