<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Loft;
use App\LoftMember;
use App\User;
use App\Pigeons;
use App\Events;
use App\EventParticipants;
use App\EventResults;
use App\EventHotspot;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoftController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$title = 'One Loft Race';
    	$current_user = auth()->user();
    	$event_owns = Events::selectRaw('*, events.id as id, lofts.id as loft_id')
            ->join('lofts', 'events.id_loft', 'lofts.id')
            ->where('lofts.id_user', $current_user->id)
	    	->orderBy('lofts.id', 'desc')
	    	->get();
        $loft_owns = Loft::where('lofts.id_user', $current_user->id)
            ->orderBy('lofts.id', 'desc')
            ->get();

        $event_follows = Events::selectRaw('distinct events.*, lofts.*, events.id as id, lofts.id as loft_id')
            ->join('lofts', 'events.id_loft', 'lofts.id')
            ->join('event_participants', 'events.id', 'event_participants.id_event')
            ->join('pigeons', 'pigeons.id', 'event_participants.id_pigeon')
            ->where('pigeons.id_user', $current_user->id)
            ->orderBy('lofts.id', 'desc')
            ->get();
        $loft_follows = Loft::selectRaw('*, lofts.id as id')
            ->where('lofts.id_user', '!=', $current_user->id)
            ->join('loft_members', 'lofts.id', 'loft_members.id_loft')
            ->join('pigeons', 'pigeons.id', 'loft_members.id_pigeon')
            ->where('pigeons.id_user', $current_user->id)
            ->orderBy('lofts.id', 'desc')
            ->get();

        $all_events = Events::selectRaw('*, events.id as id, lofts.id as loft_id')
            ->join('lofts', 'events.id_loft', 'lofts.id')
            ->orderBy('events.id', 'desc')
            ->get();

	    $event_results = EventResults::selectRaw('
	    		COUNT(id) as amount, 
	    		event_results.id_event_hotspot as id_event_hotspot
    		')
	    	->whereNotNull('event_results.speed_event_result')
	    	->groupBy('event_results.id_event_hotspot')
	    	->get();

    	$current_datetime = Carbon::now();

    	foreach ($event_owns as $event) {
            $event->distance = $this->distance($event->lat_event, $event->lng_event, $event->lat_event_end, $event->lng_event_end, "K");

            if (count($event->event_hotspot) > 0) {
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

                foreach ($event_results as $event_result) {
                    if ($event_result->id_event_hotspot == $event->event_hotspot[0]->id) {
                        $event->arrived = $event_result->amount;
                    }
                }
            }
    	}

        foreach ($event_follows as $event) {
            $event->distance = $this->distance($event->lat_event, $event->lng_event, $event->lat_event_end, $event->lng_event_end, "K");

            if (count($event->event_hotspot) > 0) {
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

                foreach ($event_results as $event_result) {
                    if ($event_result->id_event_hotspot == $event->event_hotspot[0]->id) {
                        $event->arrived = $event_result->amount;
                    }
                }
            }
        }

        foreach ($all_events as $event) {
            $event->distance = $this->distance($event->lat_event, $event->lng_event, $event->lat_event_end, $event->lng_event_end, "K");

            if (count($event->event_hotspot) > 0) {
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

                foreach ($event_results as $event_result) {
                    if ($event_result->id_event_hotspot == $event->event_hotspot[0]->id) {
                        $event->arrived = $event_result->amount;
                    }
                }
            }
        }

    	$users = User::all();

    	return view('one_loft_race.pages.one_loft',
    		compact('title','current_user','event_owns','loft_owns','event_follows','loft_follows','all_events')
    	);
    }

    /**
     * Display a listing of the lofts.
     *
     * @return \Illuminate\Http\Response
     */
    public function listLofts()
    {
        $title = 'List Lofts';
        $current_user = auth()->user();
        $loft_owns = Loft::where('lofts.id_user', $current_user->id)
            ->orderBy('lofts.id', 'desc')
            ->get();

        $loft_follows = Loft::selectRaw('*, lofts.id as id')
            ->where('lofts.id_user', '!=', $current_user->id)
            ->join('loft_members', 'lofts.id', 'loft_members.id_loft')
            ->join('pigeons', 'pigeons.id', 'loft_members.id_pigeon')
            ->where('pigeons.id_user', $current_user->id)
            ->orderBy('lofts.id', 'desc')
            ->get();

        $loft_all = Loft::all();

        return view('one_loft_race.pages.lofts',
            compact('title','current_user','loft_owns','loft_follows','loft_all')
        );
    }

    /**
     * Show the detail of the loft.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoftDetails($id)
    {
    	$title = 'Detail Loft';
    	$current_user = auth()->user();
    	$loft = Loft::find($id);
    	$pigeons = Pigeons::where('id_user', $current_user->id)
            ->whereRaw("id NOT IN (
                    SELECT id_pigeon FROM loft_members
                )
            ")
            ->get();

    	$loft->fanciers = LoftMember::selectRaw('pigeons.id_user as id_user')
    		->join('pigeons', 'loft_members.id_pigeon', 'pigeons.id')
    		->where('loft_members.id_loft', $id)
    		->where('loft_members.is_active', true)
    		->groupBy('pigeons.id_user')
    		->get();

		$current_datetime = Carbon::now();

    	foreach ($loft->event as $event) {
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
    	}

        $participants = LoftMember::selectRaw('users.id as id, users.name as name, count(pigeons.id) as count')
            ->join('pigeons', 'pigeons.id', 'loft_members.id_pigeon')
            ->join('users', 'users.id', 'pigeons.id_user')
            ->where('loft_members.id_loft', $loft->id)
            ->groupBy('users.id', 'users.name')
            ->get();

            $count_acc = LoftMember::where('id_loft', $loft->id)
            ->where('is_active', 0)
            ->count();

    	return view('one_loft_race.pages.one_loft_detail',
    		compact('title','loft','current_user','pigeons','participants','count_acc')
    	);
    }

    /**
     * Show the detail of the loft.
     *
     * @return \Illuminate\Http\Response
     */
    public function showJoinList($id)
    {
        $title = 'Permintaan Join';
        $current_user = auth()->user();
        $loft = Loft::find($id);

        $loft_members = LoftMember::where('id_loft', $loft->id)
            ->where('is_active', 0)
            ->get();

        return view('one_loft_race.pages.one_loft_detail_join_list',
            compact('title','loft','current_user','loft_members')
        );
    }

    /**
     * Show the detail of the event.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEventDetails($id, $hotspot)
    {
        $title = 'Detail Lomba';
        $event = Events::with('loft')->find($id);
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

        $event_results = EventResults::
	        whereHas('event_participant', function ($query) use($event) {
	            $query->where('active_at', '!=', null);
	            $query->where('id_event', '=', $event->id);
	        })
	        ->where('event_results.id_event_hotspot', '=', $id_hotspot)
	        ->orderBy('event_results.speed_event_result', 'desc')
	        ->get();


        $unfinished_speed = null;
        if (count($event_results) > 0) {
            $distance = $event_results[0]->speed_event_result ? ($event_results[0]->speed_event_result) * ((strtotime($event_results[0]->updated_at) - strtotime($event->release_time_event)) / 60) : null;

            $duration = strtotime(date("Y-m-d h:i:sa")) - strtotime($event->release_time_event);

            $unfinished_speed = $distance ? $distance / ($duration / 60) : null;
        }

        return view('one_loft_race.pages.one_loft_event_detail',
            compact('title','users','event','event_results','pigeons','current_datetime','hotspot', 'id_hotspot','unfinished_speed')
        );
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

        return view('one_loft_race.pages.one_loft_basketed_list',
            compact('users','current_datetime','event','event_participants','hotspot')
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

        return view('one_loft_race.pages.one_loft_live_results',
            compact('users','event','event_results','pigeons','current_datetime','hotspot', 'id_hotspot','unfinished_speed','arrived_pigeons')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
    	$data = $request->all();

    	$this->validate($request, [
    		'logo_loft' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	]);

    	$data['logo_loft'] = 'loft-' . time().'.'.$request->logo_loft->getClientOriginalExtension();
    	$request->logo_loft->move(public_path('image'), $data['logo_loft']);

    	Loft::create($data);

    	return back()->with('Sukses','Berhasil menambahkan data!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function joinLoft(Request $request, $id)
    {
        $data = $request->all();

        $data['is_active'] = 0;

        $data['id_loft'] = $id;

        LoftMember::create($data);

        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    /**
     * Store a newly created resource in events.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createEvent(Request $request)
    {
        $data = $request->all();

        $data['due_join_date_event'] = str_replace("T", " ", $request->due_join_date_event);
        $data['release_time_event'] = str_replace("T", " ", $request->release_time_event);

        $data['category_event'] = "Individu";

        $this->validate($request, [
            'logo_event' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['logo_event'] = 'logo-' . time().'.'.$request->logo_event->getClientOriginalExtension();
        $request->logo_event->move(public_path('image'), $data['logo_event']);

        $data['hotspot_length_event'] = 1;
        $data['price_event'] = 0;

        $id_event = Events::create($data)->id;

        $hotspot = [];
        $hotspot['id_event'] = $id_event;
        $hotspot['release_time_hotspot'] = $data['release_time_event'];
        for ($i=0; $i < $data['hotspot_length_event']; $i++) { 
            EventHotspot::create($hotspot);
            $hotspot['release_time_hotspot'] = null;
        }

        return back()->with('Sukses','Berhasil menambahkan data!');
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
    public function edit(Request $request)
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
    	$loft = Loft::find($id);
    	$data = $request->all();

    	if ($request->logo_loft == null) {
    		$data['logo_loft'] = $loft->logo_loft;
    	} else {
    		$this->validate($request, [
    			'logo_loft' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		]);

    		$data['logo_loft'] = 'loft-' . time().'.'.$request->logo_loft->getClientOriginalExtension();
    		$request->logo_loft->move(public_path('image'), $data['logo_loft']);
    	}

    	$loft->update($data);

    	return back()->with('Sukses','Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	Loft::find($id)->delete();

    	return back()->with('Sukses','Berhasil menghapus data!');
    }

    public function formatDateLocal($value)
    {
    	return Carbon::parse($value)->format('Y-m-d\TH:i:s');
    }

    public function formatDateCountdown($value)
    {
    	return Carbon::parse($value)->format('Y m d H i s');
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {
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


    public function acc_join($id_event){
        $loft = LoftMember::find($id_event);
        $loft->is_active = 1;
        
    
        $loft->save();
    
       return back()->with('Sukses','Berhasil Update data!');
    }
    public function delete_join($id_event){
        LoftMember::find($id_event)->delete();

        return back()->with('Sukses','Berhasil Menolak!');
    }
}