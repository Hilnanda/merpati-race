<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMSFooter;
use App\CMSMedsos;
use App\User;
use App\Events;
use App\Pigeons;
use App\EventHotspot;
use App\EventResults;
use App\EventParticipants;
use App\CLubMember;
use App\TeamMembers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
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
        $title = 'Lomba Umum';
        $events = Events::with($this->relationships)
        ->where('branch_event', 'Umum')
        ->orderBy('events.id', 'desc')->get();
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

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

        return view('subscribed.pages.events_content', 
            compact('data_medsos','data_footer','users','events','current_datetime','title')
        );
    }

    /**
     * Display a Menu page.
     *
     * @return \Illuminate\Http\Response
     */
    public function menuPage()
    {
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        return view('subscribed.pages.events_menu',
            compact('data_medsos','data_footer','users')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventClub()
    {
        $title = 'Lomba Club';
        $events = Events::join('clubs', 'clubs.id', 'events.id_club')
        ->where('events.branch_event', 'Club')
        ->orderBy('events.id', 'desc')
        ->get();

        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        $current_datetime = Carbon::now();

        foreach ($events as $event) {

            $event->release_time_event = $this->formatDateLocal($event->release_time_event);
            $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);
            $event->due_join_date_event = $this->formatDateLocal($event->due_join_date_event);
            if ($event->release_time_event <= $current_datetime) {
                $event->status = 'Terbang';
                $event->color = '#32CD32';
            } else {
                if ($event->due_join_date_event < $current_datetime) {
                    $event->status = 'Pendaftaran ditutup';
                    $event->color = '#EB0000';
                } else {
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

        return view('subscribed.pages.events_content', 
            compact('data_medsos','data_footer','users','events','current_datetime','title')
        );
    }

    /**
     * Show the basketed list of the registered pigeons.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBasketedList($id, $hotspot)
    {
        $event = Events::with($this->relationships)->find($id);
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

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

        $event_participants = EventResults::with($this->event_results_relationships)
        ->whereHas('event_participant', function ($query) use($event) {
            $query->where('active_at', '!=', null);
            $query->where('id_event', '=', $event->id);
        })
        ->where('event_results.id_event_hotspot', '=', $id_hotspot)
        ->orderBy('event_results.created_at', 'asc')
        ->get();

        $event->release_time_event = $this->formatDateLocal($event->release_time_event);
        $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);
        foreach ($event_participants as $event_participant) {
            $event_participant->created_at = $this->formatDateLocal($event_participant->created_at);
        }

        return view('subscribed.pages.events_basketed_list',
            compact('data_medsos','data_footer','users','current_datetime','event','event_participants','hotspot')
        );
    }

    /**
     * Show the detail of the events.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDetails($id, $hotspot)
    {
        $event = Events::with($this->relationships)->find($id);
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
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

        $event_results = EventResults::with($this->event_results_relationships)
        ->whereHas('event_participant', function ($query) use($event) {
            $query->where('active_at', '!=', null);
            $query->where('id_event', '=', $event->id);
        })
        ->where('event_results.id_event_hotspot', '=', $id_hotspot)
        ->orderBy('event_results.speed_event_result', 'desc')
        ->get();

        if (count($event_results) > 0) {
            $distance = $event_results[0]->speed_event_result ? ($event_results[0]->speed_event_result) * ((strtotime($event_results[0]->updated_at) - strtotime($event->release_time_event)) / 60) : null;

            $duration = strtotime(date("Y-m-d h:i:sa")) - strtotime($event->release_time_event);

            $unfinished_speed = $distance ? $distance / ($duration / 60) : null;
        }

        return view('subscribed.pages.events_details',
            compact('data_medsos','data_footer','users','event','event_results','pigeons','current_datetime','hotspot', 'id_hotspot','unfinished_speed')
        );
    }

    /**
     * Show the detail of the events.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLiveResults($id, $hotspot)
    {
        $event = Events::with($this->relationships)->find($id);
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
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

        $event_results = EventResults::with($this->event_results_relationships)
        ->whereHas('event_participant', function ($query) use($event) {
            $query->where('active_at', '!=', null);
            $query->where('id_event', '=', $event->id);
        })
        ->where('event_results.id_event_hotspot', '=', $id_hotspot)
        ->orderBy('event_results.speed_event_result', 'desc')
        ->get();

        if (count($event_results) > 0) {
            $distance = $event_results[0]->speed_event_result ? ($event_results[0]->speed_event_result) * ((strtotime($event_results[0]->updated_at) - strtotime($event->release_time_event)) / 60) : null;

            $duration = strtotime(date("Y-m-d h:i:sa")) - strtotime($event->release_time_event);

            $unfinished_speed = $distance ? $distance / ($duration / 60) : null;
        }

        $arrived_pigeons = [];

        foreach ($event_results as $key => $event_result) {
            if ($event_result->speed_event_result) {
                array_push($arrived_pigeons, $event_result->event_participant->pigeons);
            }
        }

        return view('subscribed.pages.events_live_results',
            compact('data_medsos','data_footer','users','event','event_results','pigeons','current_datetime','hotspot', 'id_hotspot','unfinished_speed','arrived_pigeons')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Store a newly created joined pigeon.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function joinEvent($id, Request $request)
    {
        $data = $request->all();

        $club_member = CLubMember::where('id_pigeon', $data['id_pigeon'])->first();
        $team_member = TeamMembers::where('id_pigeon', $club_member['id_pigeon'])->first();

        $data['id_event'] = $id;
        $data['current_id_club'] = $club_member['id_club'];
        $data['current_id_team'] = $team_member ? $team_member['id_team'] : null;

        EventParticipants::create($data);

        return back()->with('Sukses','Berhasil join, menunggu verifikasi pembayaran!');
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
}
