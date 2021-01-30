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
use App\Content;
use App\Events;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    protected $relationships = ['event_participants', 'event_hotspot', 'club', 'user'];
    protected $event_results_relationships = ['event_participant', 'event_hotspot'];
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $content = Content::all();
        $club = Clubs::all();
        $user = User::all();
        $news = CMSNews::limit(3)
        ->get();


        $events = Events::with($this->relationships)
            ->where('branch_event', 'Club')
            // ->where('id_club', $id)
            ->orderBy('events.id', 'desc')->get();

        // $event_clubs = Events::find($id); 
        // dd($event_clubs);
        // $clubs= Clubs::where('id',$id)
        // ->first();
        $current_datetime = Carbon::now();

        foreach ($events as $event) {
            $event->release_time_event = null;
            $event->expired_time_event = null;
            foreach ($event->event_hotspot as $hotspot) {
                if ($hotspot->release_time_hotspot) {
                    $event->release_time_event = $this->formatDateLocal($hotspot->release_time_hotspot);
                    if ($hotspot->expired_time_hotspot) {
                        $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);
                    }
                    if ($event->release_time_event <= $current_datetime) {
                        break;
                    }
                }
            }
            $event->due_join_date_event = $this->formatDateLocal($event->due_join_date_event);
            if (strtotime($event->release_time_event) <= strtotime($current_datetime)) {
                $diff = strtotime($current_datetime) - strtotime($event->release_time_event);
                $days = floor($diff / 86400);
                $hours = floor($diff / 3600) % 24;
                $minutes = floor($diff / 60) % 60;
                $seconds = $diff % 60;

                // $event->status = 'Terbang (' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                $event->status = 'Terbang';
                $event->color = '#32CD32';
            } else {
                if (strtotime($event->due_join_date_event) < strtotime($current_datetime)) {
                    $diff = strtotime($event->release_time_event) - strtotime($current_datetime);
                    $days = floor($diff / 86400);
                    $hours = floor($diff / 3600) % 24;
                    $minutes = floor($diff / 60) % 60;
                    $seconds = $diff % 60;

                    // $event->status = 'Pendaftaran ditutup (-' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                    $event->status = 'Pendaftaran ditutup';
                    $event->color = '#EB0000';
                } else {
                    $diff = strtotime($event->due_join_date_event) - strtotime($current_datetime);
                    $days = floor($diff / 86400);
                    $hours = floor($diff / 3600) % 24;
                    $minutes = floor($diff / 60) % 60;
                    $seconds = $diff % 60;

                    // $event->status = 'Belum dimulai (-' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                    $event->status = 'Belum dimulai';
                    $event->color = '#000000';
                    // $date = strtotime($event->release_time_event);
                    // $event->status = $date - time();
                }
            }
            if ($event->lat_event_end != null) {
                $event->distance = $this->distance($event->lat_event, $event->lng_event, $event->lat_event_end, $event->lng_event_end, "K");
            }
        }
        // dd($news);
        return view('pages.home',[
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'clubs' => $club, 
            'users' => $user,
            'news' => $news,
            'content' => $content,
            'events' => $events,
            ]);

    }

    public function formatDateLocal($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i:s');
    }


    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
      }
      else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
  
          if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
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
