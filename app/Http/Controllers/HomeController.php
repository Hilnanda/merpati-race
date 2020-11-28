<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMSFooter;
use App\CMSMedsos;
use App\Clubs;
use App\CMSAbout;
use App\User;
use App\CMSNews;
use App\CMSContact;


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
        $news = CMSNews::limit(3)
        ->get();
        // dd($news);
        return view('pages.home',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user,
            'news' => $news,
            ]);

    }
    public function contact()
    {
        
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $club = Clubs::all();
        $user = User::all();
        $contact = CMSContact::limit(1)->get();
        return view('pages.contact',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user,
            'contact' => $contact
            ]);

    }
    public function about_us()
    {
        
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $club = Clubs::all();
        $user = User::all();
        $contact = CMSContact::limit(1)->get();
        $about = CMSAbout::limit(1)->first();
        return view('pages.about-us',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user,
            'contact' => $contact,
            'about' => $about
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
        $news = CMSNews::all();
        return view('pages.news',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user,
            'news' => $news
            ]);

    }
    public function news_desc($id)
    {
        
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $club = Clubs::all();
        $user = User::all();
        $news = CMSNews::find($id);
        return view('pages.news-read',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user,
            'news' => $news
            ]);

    }
   public function club()
   {
    $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $club = Clubs::all();
        $user = User::all();
        $news = CMSNews::all();
        return view('club.page_awal',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user,
            'news' => $news
            ]);
   }
   public function add_training(){
    $data_medsos = CMSMedsos::all();
    $data_footer = CMSFooter::all();
    $club = Clubs::all();
    $user = User::all();
    $news = CMSNews::all();
    return view('club.add_training',[
        'data_medsos'=>$data_medsos,
        'data_footer'=>$data_footer,
        'clubs' => $club, 
        'users' => $user,
        'news' => $news
        ]);
   }
   public function add_training_post(Request $request){
        $training = $request->all();
        return redirect('/club');
   }
}
