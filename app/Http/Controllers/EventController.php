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
        $events = Events::all();
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        $current_datetime = Carbon::now();

        $events_on_going = array();
        $events_soon = array();

        foreach ($events as $event) {
            $event->release_time_event = $this->formatDateLocal($event->release_time_event);
            $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);
            if ($event->release_time_event <= $current_datetime) {
                array_push($events_on_going, $event);
            } else {
                array_push($events_soon, $event);
            }
        }

        return view('subscribed.pages.events_content', [
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'events_on_going' => $events_on_going,
            'events_soon' => $events_soon,
            'users' => $users,
            'current_datetime' => $current_datetime]);
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

        $current_datetime = Carbon::now();

        $event->release_time_event = $this->formatDateLocal($event->release_time_event);
        $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);

        return view('subscribed.pages.events_basketed_list', [
            'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
            'users' => $users,
            'current_datetime' => $current_datetime,
            'event' => $event
        ]);
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

        $event->release_time_event = $this->formatDateLocal($event->release_time_event);
        $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);

        // $results = DB::table('event_participants')
        //     ->leftJoin('event_results', 'event_participants.id', '=', 'event_results.id_event_participant')
        //     ->join('pigeons', 'event_participants.id_pigeon', '=', 'pigeons.id')
        //     ->join('users', 'pigeons.id_user', '=', 'users.id')
        //     ->leftJoin('club_members', 'pigeons.id', '=', 'club_members.id_pigeon')
        //     ->join('clubs', 'club_members.id_club', '=', 'clubs.id')
        //     ->leftJoin('team_members', 'clubs.id', '=', 'team_members.id_club')
        //     ->join('teams', 'team_members.id_team', '=', 'teams.id')
        //     ->get();
        $results = EventParticipants::leftJoin('clubs', 'event_participants.current_id_club', '=', 'clubs.id')
            ->leftJoin('teams', 'event_participants.current_id_team', '=', 'teams.id')
            ->get();

        // foreach ($results as $result) {
        //     if ($result->event_results->created_at) {
        //         $result->event_results->created_at = $this->formatDateLocal($result->event_results->created_at);
        //     }
        // }

        return view('subscribed.pages.events_details',
            compact('data_medsos','data_footer','users','event','results','pigeons')
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

        $pigeon = Pigeons::find($data['id_pigeon']);

        $data['id_event'] = $id;
        $data['current_id_club'] = $pigeon->club_member->id_club;
        $data['current_id_team'] = $pigeon->club_member->club->team_member->id_team;

        EventParticipants::create($data);

        return back()->with('Sukses','Berhasil join, mohon tunggu konfirmasi Manajer!');
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
}
