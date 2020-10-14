<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMSFooter;
use App\CMSMedsos;
use App\Clubs;
use App\User;


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
        $club = Clubs::all();
        $user = User::all();
        return view('pages.home',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user
            ]);

    }
    public function contact()
    {
        
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $club = Clubs::all();
        $user = User::all();
        return view('pages.contact',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user
            ]);

    }
    public function product_service()
    {
        
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $club = Clubs::all();
        $user = User::all();
        return view('pages.product-service',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user
            ]);

    }
    public function news()
    {
        
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $club = Clubs::all();
        $user = User::all();
        return view('pages.news',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user
            ]);

    }
    
}
