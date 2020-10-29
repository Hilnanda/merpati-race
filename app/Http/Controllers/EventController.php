<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMSFooter;
use App\CMSMedsos;
use App\User;
use App\Events;
use App\Pigeons;
use App\EventResults;
use App\EventParticipants;
use App\CLubMember;
use App\TeamMembers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::orderBy('events.id', 'desc')->get();
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
            compact('data_medsos','data_footer','users','events','current_datetime')
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
     * Show the basketed list of the registered pigeons.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBasketedList($id)
    {
        $event = Events::find($id);
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $participants = EventParticipants::where('event_participants.id_event', $event->id)
        ->orderBy('event_participants.basketed_at', 'asc')
        ->get();

        $current_datetime = Carbon::now();

        $event->release_time_event = $this->formatDateLocal($event->release_time_event);
        $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);

        return view('subscribed.pages.events_basketed_list',
            compact('data_medsos','data_footer','users','current_datetime','event','participants')
        );
    }

    /**
     * Show the detail of the events.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDetails($id)
    {
        $event = Events::find($id);
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $auth_session = auth()->user()->id;
        $pigeons = Pigeons::where('pigeons.is_active', 1)
        ->where('pigeons.id_user', $auth_session)
        ->whereRaw('pigeons.id NOT IN (SELECT id_pigeon FROM event_participants)')
        ->get();

        $current_datetime = Carbon::now();

        $event->release_time_event = $this->formatDateLocal($event->release_time_event);
        $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);
        $event->due_join_date_event = $this->formatDateLocal($event->due_join_date_event);

        $results = EventParticipants::leftJoin('clubs', 'event_participants.current_id_club', '=', 'clubs.id')
        ->leftJoin('teams', 'event_participants.current_id_team', '=', 'teams.id')
        ->leftJoin('event_results', 'event_participants.id', '=', 'event_results.id_event_participant')
        ->where('event_participants.active_at', '!=', 'null')
        ->where('event_participants.id_event', '=', $event->id)
        ->get();

        foreach ($results as $result) {
            if ($result->event_results) {
                $result->event_results['created_at'] = $this->formatDateLocal($result->event_results['created_at']);
            }
        }

        return view('subscribed.pages.events_details',
            compact('data_medsos','data_footer','users','event','results','pigeons','current_datetime')
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
        $team_member = TeamMembers::where('id_club', $club_member['id_club'])->first();

        $data['id_event'] = $id;
        $data['current_id_club'] = $club_member['id_club'];
        $data['current_id_team'] = $team_member['id_team'];

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
        return Carbon::parse($value)->format('Y-m-d\TH:i');
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
