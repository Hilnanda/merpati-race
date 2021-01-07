<?php

namespace App\Http\Controllers;
use App\CMSFooter;
use App\CMSMedsos;
use App\Clubs;
use App\User;
use App\CMSNews;
use App\CMSContact;
use App\ClubMember;
use App\Events;
use App\EventResults;
use App\Loft;
use App\OperatorClubs;
use App\Hardware;
use DB;
use App\Pigeons;
use Carbon\Carbon;
use App\EventParticipants;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    protected $relationships = ['event_participants', 'event_hotspot', 'club', 'user'];
    protected $event_results_relationships = ['event_participant', 'event_hotspot'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd($id);
        // event
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
            if ($event->release_time_event <= $current_datetime) {
                $diff = strtotime($current_datetime) - strtotime($event->release_time_event);
                $days = floor($diff / 86400);
                $hours = floor($diff / 3600) % 24;
                $minutes = floor($diff / 60) % 60;
                $seconds = $diff % 60;

                // $event->status = 'Terbang (' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                $event->status = 'Terbang';
                $event->color = '#32CD32';
            } else {
                if ($event->due_join_date_event < $current_datetime) {
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
        $users = User::all();
        $id_user = User::where('id',auth()->user()->id)->first();
        // $id_pigeon = Pigeons::where('id_user',auth()->user()->id)
        // ->where('is_active',1)->get();
        $id_pigeon = DB::table('event_participants')
        ->join('pigeons','pigeons.id','=','event_participants.id_pigeon')
        ->where('pigeons.id_user','=',auth()->user()->id)
        ->get();
        
        
        $club = DB::table('club_members')
        ->rightjoin('clubs','club_members.id_club','=','clubs.id')
        ->where('clubs.id_user','=',auth()->user()->id)
        ->get();
        
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $auth_session = auth()->user()->id;
        // $pigeon = Pigeons::where('pigeons.is_active', 1)
        // ->where('pigeons.id_user', auth()->user()->id)
        // ->whereRaw('pigeons.id NOT IN (SELECT id_pigeon FROM club_members)')
        // ->get();
        $clubku = Clubs::where('id_user', auth()->user()->id)
        ->orwhere('manager_club',auth()->user()->id)
        ->get();

        $club_id = Clubs::whereRaw("id NOT IN (SELECT id_club FROM club_members where id_user = $auth_session)")
        ->where('id_user', '!=' ,auth()->user()->id)
        ->orderBy('name_club','asc')
        ->get();
        // dd($club_id);
        
        $club_ikut = ClubMember::
        // ->select('clubs.*','users.*','pigeons.*','clubs.id_user as operator_id')
        // ->join('club_members','club_members.id_club','=','clubs.id')
        // ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        // ->join('users', 'users.id', '=', 'pigeons.id_user')
        // whereHas('pigeon', function($q){
        //     $q->where('id_user', auth()->user()->id);
        //  })
        where('id_user', auth()->user()->id)
        // ->where('is_active', 1)
        ->get();
    //    dd($club_ikut);
       $club_belum_ikut = Clubs::select('clubs.*');

       $list_event = Events::all();

        return view('subscribed.pages.club',
        compact('events','list_event','id_pigeon','id_user','users','club','data_medsos','data_footer','club_id','club_ikut','club_belum_ikut','clubku')
        );
    }

    public function set_lokasi(Request $request){
        $users = User::find($request->id);
        $users->update($request->all());

        return back()->with('Sukses','Berhasil mengubah data!');
    }

    public function join_loft_club($id_club,$id_user)
    {
        $Clubs = new ClubMember();

        $Clubs->id_user = $id_user;
        $Clubs->id_club = $id_club;
        $Clubs->is_active = 0;
        

        $Clubs->save();

        return redirect('/club')->with('Sukses','Menunggu Konfirmasi Pemilik Club!');
    }



    public function detail_ikut($id)
    {
        $club = Clubs::find($id);
        $users = User::all();
        $clubs= Clubs::where('id',$id)
        ->first();        
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $list_pigeons = ClubMember::
        // ->join('clubs','club_members.id_club','=','clubs.id')
        // ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        // ->join('users','users.id','pigeons.id_user')
        where('is_active',1)->
        where('id_club', $id)->get();

        $clubku = Clubs::where('id','=',$id)        
        ->get();
        
        $pigeon = Pigeons::where('pigeons.is_active', 1)
        ->where('pigeons.id_user', auth()->user()->id)
        ->whereRaw('pigeons.id NOT IN (SELECT id_pigeon FROM club_members)')
        ->get();
        $operator = OperatorClubs::where('id_user',auth()->user()->id)
        ->first();

        $join_operator = DB::table('operator_clubs')
        ->select('clubs.*','users.*','operator_clubs.*','operator_clubs.id as operator_id')
        ->join('clubs','operator_clubs.id_club','=','clubs.id')
        ->join('users', 'operator_clubs.id_user', '=', 'users.id')
        ->where('operator_clubs.id_club', $id)
        ->get();

        return view('subscribed.pages.club_detail_ikut',compact('pigeon','clubku','club','data_medsos','data_footer','users','clubs','list_pigeons','join_operator','operator'));
    }



    public function detail_saya($id)
    {
        // dd($id);
        // event
        $events = Events::with($this->relationships)
            ->where('branch_event', 'Club')
            ->where('id_club', $id)
            ->orderBy('events.id', 'desc')->get();

        $event_clubs = Events::find($id); 
        // dd($event_clubs);
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
            if ($event->release_time_event <= $current_datetime) {
                $diff = strtotime($current_datetime) - strtotime($event->release_time_event);
                $days = floor($diff / 86400);
                $hours = floor($diff / 3600) % 24;
                $minutes = floor($diff / 60) % 60;
                $seconds = $diff % 60;

                // $event->status = 'Terbang (' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                $event->status = 'Terbang';
                $event->color = '#32CD32';
            } else {
                if ($event->due_join_date_event < $current_datetime) {
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

        // club
        $club = Clubs::find($id);
        $users = User::all();
        
        // dd($clubs);
        $list_pigeons = ClubMember::
        // ->join('clubs','club_members.id_club','=','clubs.id')
        // ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        // ->join('users','users.id','pigeons.id_user')
        where('is_active',1)->
        where('id_club', $id)->get();


        $clubku = Clubs::where('id','=',$id)        
        ->get();
        
        $pigeon = Pigeons::where('pigeons.is_active', 1)
        ->where('pigeons.id_user', auth()->user()->id)
        ->whereRaw('pigeons.id NOT IN (SELECT id_pigeon FROM club_members)')
        ->get();

        $operator = DB::table('club_members')
        ->select('users.name','users.username','users.id')
        ->join('clubs','club_members.id_club','=','clubs.id')
        ->join('users', 'users.id', '=', 'club_members.id_user')
        // ->join('users', 'pigeons.id_user', '=', 'users.id')
        ->where('club_members.id_club', $id)
        ->where('club_members.is_active', 1)
        ->whereRaw('users.id NOT IN (SELECT id_user FROM operator_clubs)')
        ->where('users.id','!=', auth()->user()->id)
        ->groupByRaw('users.name, users.username ,users.id')
        ->get();

        $operator_exist = OperatorClubs::where('id_user',auth()->user()->id)
            ->where('id_club',$id)
            ->first();
        if (isset($operator_exist)) {
            $exist = 1;
        }else {
            $exist = 0;
        }
        // dd($exist);

        $join_operator = DB::table('operator_clubs')
        ->select('clubs.*','users.*','operator_clubs.*','operator_clubs.id as operator_id')
        ->join('clubs','operator_clubs.id_club','=','clubs.id')
        ->join('users', 'operator_clubs.id_user', '=', 'users.id')
        ->where('operator_clubs.id_club', $id)
        ->get();

        $results = EventParticipants::selectRaw('*, event_results.created_at as event_results_created_at, event_results.speed_event_result as event_results_speed_event_result, clubs.id as clubs_id, clubs.name_club as clubs_name_club, teams.id as teams_id, teams.name_team as teams_name_team')
        ->leftJoin('clubs', 'event_participants.current_id_club', '=', 'clubs.id')
        ->leftJoin('teams', 'event_participants.current_id_team', '=', 'teams.id')
        ->leftJoin('event_results', 'event_participants.id', '=', 'event_results.id_event_participant')
        ->where('event_participants.active_at', '!=', 'null')
        ->where('event_participants.current_id_club', '=', $id)
        ->get();
        
        // dd($clubs->manager_club);
        // dd($clubs);
        $clubs= Clubs::where('id',$id)
        ->first();
        // if($clubs->manager_club==auth()->user()->id){
            
        //     $clubs= Clubs::where('manager_club', auth()->user()->id)
        // ->where('id',$id)
        // ->first();
        // } else {
        //     $clubs= Clubs::where('id_user', auth()->user()->id)
        // ->where('id',$id)
        // ->first();
        // }
        $data = ClubMember::find($id);
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        $count_acc = ClubMember::where('is_active',0)
        ->where('id_club', $id)
        ->count();

        $count_pigeon = Pigeons::where('id_club', $id)
        ->count();

        // negara
        // dd($clubs->country_clubs);
        

        
        return view('subscribed.pages.club_saya_detail',compact('exist','operator_exist','pigeon','clubku','club',
        'data_medsos','data_footer','users','clubs','data','operator',
        'join_operator','list_pigeons','id','results','event_clubs','events',
        'current_datetime','count_acc','count_pigeon'
    ));
    }

    /**
     * Show the basketed list of the registered pigeons.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBasketedList($id, $hotspot)
    {
        $event = Events::find($id);
        $users = User::all();

        $current_datetime = Carbon::now();

        $id_hotspot = null;

        foreach ($event->event_hotspot as $key => $event_hotspot) {
            if ($key + 1 == $hotspot) {
                $id_hotspot = $event_hotspot->id;
                $event->release_time_event = $this->formatDateLocal($event_hotspot->release_time_hotspot);
                if ($event_hotspot->expired_time_hotspot) {
                    $event->expired_time_event = $this->formatDateLocal($event->expired_time_hotspot);
                }
            }
        }

        $event_participants = EventParticipants::where('active_at', '!=', null)
            ->where('id_event', '=', $event->id)
            ->orderBy('event_participants.active_at', 'asc')
            ->get();

        $event->release_time_event = $this->formatDateLocal($event->release_time_event);
        $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);

        // Get Status Event
        $current_datetime = Carbon::now();

        $event->distance = $this->distance($event->lat_event, $event->lng_event, $event->lat_event_end, $event->lng_event_end, "K");

        if ($event->event_hotspot[0]->release_time_hotspot <= $current_datetime) {
            $event->status = 'Terbang';
            $event->color = '#32CD32';
        } else {
            if ($event->due_join_date_event < $current_datetime) {
                $event->status = 'Pendaftaran ditutup';
                $event->color = '#EB0000';
            } else {
                $event->status = 'Pendaftaran dibuka';
                $event->color = '#000000';
            }
        }

        $operator_exist = OperatorClubs::where('id_user',auth()->user()->id)
            ->where('id_club',$event->id_club)
            ->first();
        $exist = 0;
        if (isset($operator_exist)) {
            $exist = 1;
        }

        $hardware_inkorf = Hardware::where('id_event', $id)->where('label_hardware', 'inkorf')->first();

        return view('subscribed.pages.club_basketed_list',
            compact('users','current_datetime','event','event_participants','hotspot','exist','hardware_inkorf')
        );
    }

    /**
     * Show the detail of the events.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLiveResults($id, $hotspot)
    {
        $event = Events::find($id);
        $users = User::all();
        $auth_session = auth()->user()->id;
        $pigeons = Pigeons::selectRaw('*, pigeons.id as pigeon_id')
            ->join('club_members', 'club_members.id_pigeon', 'pigeons.id')
            ->leftJoin('team_members', 'team_members.id_pigeon', 'pigeons.id')
            ->leftJoin('teams', 'teams.id', 'team_members.id_team')
            ->leftJoin('event_participants', 'event_participants.id_pigeon', 'pigeons.id')
            ->where('pigeons.is_active', 1)
            ->where('club_members.is_active', 1)
            ->where('pigeons.id_user', $auth_session)
            ->whereRaw("pigeons.id NOT IN (
                    SELECT id_pigeon FROM event_participants
                )
                OR
                pigeons.id IN (
                    SELECT id_pigeon FROM event_participants
                    JOIN event_results
                    ON event_participants.id = event_results.id_event_participant
                    JOIN event_hotspots
                    ON event_hotspots.id = event_results.id_event_hotspot
                    WHERE event_participants.id_event = $id
                )
            ")
            ->get();

        $current_datetime = Carbon::now();

        $id_hotspot = null;

        foreach ($event->event_hotspot as $key => $event_hotspot) {
            if ($key + 1 == $hotspot) {
                $id_hotspot = $event_hotspot->id;
                $event->release_time_event = $this->formatDateLocal($event_hotspot->release_time_hotspot);
                if ($event_hotspot->expired_time_hotspot) {
                    $event->expired_time_event = $this->formatDateLocal($event->expired_time_hotspot);
                }
            }
        }
        
        $event->due_join_date_event = $this->formatDateLocal($event->due_join_date_event);

        $event_results = EventResults::whereHas('event_participant', function ($query) use($event) {
                $query->where('active_at', '!=', null);
                $query->where('id_event', '=', $event->id);
            })
            ->where('event_results.id_event_hotspot', '=', $id_hotspot)
            ->orderBy('event_results.speed_event_result', 'desc')
            ->get();

        $unfinished_speed = null;

        foreach ($event_results as $event_result) {
            if ($event_results[0] && $event_results[0]->speed_event_result) {
                $event_result->distance = $event_results[0]->speed_event_result * ((strtotime($event_results[0]->updated_at) - strtotime($event->release_time_event)) / 60);

                $event_result->duration = strtotime(date("Y-m-d h:i:sa")) - strtotime($event->release_time_event);

                $event_result->unfinished_speed = $event_result->distance ? $event_result->distance / ($event_result->duration / 60) : null;
            }
        }

        // if (count($event_results) > 0) {
        //     $distance = $event_results[0]->speed_event_result ? ($event_results[0]->speed_event_result) * ((strtotime($event_results[0]->updated_at) - strtotime($event->release_time_event)) / 60) : null;

        //     $duration = strtotime(date("Y-m-d h:i:sa")) - strtotime($event->release_time_event);

        //     $unfinished_speed = $distance ? $distance / ($duration / 60) : null;
        // }

        $arrived_pigeons = [];

        foreach ($event_results as $key => $event_result) {
            if ($event_result->speed_event_result) {
                array_push($arrived_pigeons, $event_result->event_participant->pigeons);
            }
        }

        if (!$arrived_pigeons) {
            $event_results = [];
        }

        return view('subscribed.pages.club_live_results',
            compact('users','event','event_results','pigeons','current_datetime','hotspot', 'id_hotspot','arrived_pigeons')
        );
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



    public function detail_belum_ikut($id)
    {
        $club = Clubs::where('id','=',$id)        
        ->get();
        
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all(); 

        $events = Events::with($this->relationships)
        ->where('branch_event', 'Club')
        ->where('id_club', $id)
        ->orderBy('events.id', 'desc')->get();

        $event_clubs = Events::find($id); 
        // dd($event_clubs);
        $current_datetime = Carbon::now();

        $list_pigeons = ClubMember::
        // ->join('clubs','club_members.id_club','=','clubs.id')
        // ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        // ->join('users','users.id','pigeons.id_user')
        where('is_active',1)
        ->where('id_club', $id)->get();

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
            if ($event->release_time_event <= $current_datetime) {
                $diff = strtotime($current_datetime) - strtotime($event->release_time_event);
                $days = floor($diff / 86400);
                $hours = floor($diff / 3600) % 24;
                $minutes = floor($diff / 60) % 60;
                $seconds = $diff % 60;

                $event->status = 'Terbang (' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                $event->color = '#32CD32';
            } else {
                if ($event->due_join_date_event < $current_datetime) {
                    $diff = strtotime($event->release_time_event) - strtotime($current_datetime);
                    $days = floor($diff / 86400);
                    $hours = floor($diff / 3600) % 24;
                    $minutes = floor($diff / 60) % 60;
                    $seconds = $diff % 60;

                    $event->status = 'Pendaftaran ditutup (-' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                    $event->color = '#EB0000';
                } else {
                    $diff = strtotime($event->due_join_date_event) - strtotime($current_datetime);
                    $days = floor($diff / 86400);
                    $hours = floor($diff / 3600) % 24;
                    $minutes = floor($diff / 60) % 60;
                    $seconds = $diff % 60;

                    $event->status = 'Belum dimulai (-' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                    $event->color = '#000000';
                    // $date = strtotime($event->release_time_event);
                    // $event->status = $date - time();
                }
            }
            if ($event->lat_event_end != null) {
                $event->distance = $this->distance($event->lat_event, $event->lng_event, $event->lat_event_end, $event->lng_event_end, "K");
            }
        }
        // $pigeon = DB::select('select * from pigeons where is_active = 1');
        // dd($pigeon);
        $club_ikut = DB::table('clubs')
        ->join('club_members','club_members.id_club','=','clubs.id')
        ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        ->join('users', 'users.id', '=', 'pigeons.id_user')
        ->where('pigeons.id_user', auth()->user()->id)
        ->get();

        $results = EventParticipants::selectRaw('*, event_results.created_at as event_results_created_at, event_results.speed_event_result as event_results_speed_event_result, clubs.id as clubs_id, clubs.name_club as clubs_name_club, teams.id as teams_id, teams.name_team as teams_name_team')
        ->leftJoin('clubs', 'event_participants.current_id_club', '=', 'clubs.id')
        ->leftJoin('teams', 'event_participants.current_id_team', '=', 'teams.id')
        ->leftJoin('event_results', 'event_participants.id', '=', 'event_results.id_event_participant')
        ->where('event_participants.active_at', '!=', 'null')
        ->where('event_participants.current_id_club', '=', $id)
        ->get();
        // dd($club_ikut);
        $pigeon = Pigeons::where('pigeons.id_user', auth()->user()->id)
        // ->whereRaw('pigeons.id NOT IN (SELECT id_pigeon FROM club_members)')
        ->get();
        
        
        return view('subscribed.pages.club_detail_belum_ikut',compact('pigeon','club','data_medsos','data_footer','users','club_ikut','list_pigeons','results','event_clubs','events','current_datetime'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function join_club(Request $request)
    {
         $data = $request->all();
        // dd($data);
        $data['is_active'] = 0;
        
        ClubMember::create($data);
    //    $data =  ClubMember::create($request->all());
       
        return back()->with('Sukses','Berhasil menambahkan data!');
        
    }
    public function destroy_operator($id)
    {
        OperatorClubs::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
       
        
    }
    public function join_operator(Request $request)
    {
        OperatorClubs::create($request->all());
    //    $data =  ClubMember::create($request->all());
       
        return back()->with('Sukses','Berhasil menambahkan data!');
        
    }
    public function manager($id){
        $akun = ClubMember::find($id);
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $acc = ClubMember::where('club_members.is_active',0)
        ->where('id_club', $id)
        ->get();
        // dd($acc);
       return view('subscribed.pages.club_acc_gabung',compact('acc','akun','users','data_medsos','data_footer'));
    }


   public function acc_club($id){
    $Clubs = ClubMember::find($id);
    $Clubs->is_active = 1;
    

    $Clubs->save();

   return back()->with('Sukses','Berhasil Update data!');
   }


   public function del_club($id){
       $hapus_acc_club = ClubMember::find($id);
       $hapus_acc_club->delete($hapus_acc_club);
       return back()->with('Sukses','Berhasil Delete data!');
   }


//    Loft
    public function desc_loft($id_loft,$id_club){
        $get_loft = ClubMember::where('id_club',$id_club)
        ->where('id_user',$id_loft)->first();
        $count_pigeon = Pigeons::where('id_user',$id_loft)
        ->where('id_club',$id_club)->count();
        $list_pigeon = Pigeons::where('id_user',$id_loft)
        ->where('id_club',$id_club)
        ->get();
        // dd($count_pigeon);
        $clubs= Clubs::where('id',$id_club)
        ->first();

        $operator_exist = OperatorClubs::where('id_user',auth()->user()->id)
        ->where('id_club',$id_club)
        ->first();
        if (isset($operator_exist)) {
            $exist = 1;
        }else {
            $exist = 0;
        }

        return view('subscribed.pages.club_loft',compact(
            'get_loft',
            'count_pigeon',
            'list_pigeon',
            'clubs',
            'exist'
        ));
    }

// update nama loft User

    

   public function add_lomba(){

   }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
