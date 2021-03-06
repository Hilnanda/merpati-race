<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CMSFooter;
use App\Pigeons;
use App\CMSMedsos;
use App\Events;
use App\EventHotspot;
use App\User;
use App\EventResults;
use App\EventParticipants;
use App\CLubMember;
use App\TeamMembers;
use App\Clubs;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EventClubController extends Controller
{
    protected $relationships = ['event_participants', 'event_hotspot', 'club', 'user'];
    protected $event_results_relationships = ['event_participant', 'event_hotspot'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $clubs= Clubs::where('id',$id)
        ->first();
        $title = 'Lomba Club';
        $events = Events::with($this->relationships)
        ->where('branch_event', 'Club')
        ->where('id_club', $id)
        ->orderBy('events.id', 'desc')->get();
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
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

        return view('subscribed.pages.club_lihat_event', 
            compact('id','clubs','event_clubs','data_medsos','data_footer','users','events','current_datetime','title')
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
    public function store($id,Request $request)
    {
        //
        $data = $request->all();

        $data['due_join_date_event'] = str_replace("T", " ", $request->due_join_date_event);
        $data['release_time_event'] = str_replace("T", " ", $request->release_time_event);

        $data['branch_event'] = "Club";
        $data['id_club'] = $id;
        // $extension = $request->file('logo_event')->extension();
        // $img_name = 'logo-' . $data['name_event'] . '-' . date('dmyHis') . '.' . $extension;
        // $this->validate($request, ['logo_event' => 'required|file|max:5000']);
        // $path = Storage::putFileAs('public/image-logo', $request->file('logo_event'), $img_name);

        // $data['logo_event'] = $img_name;

        $this->validate($request, [
            'logo_event' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['logo_event'] = 'logo-' . time().'.'.$request->logo_event->getClientOriginalExtension();
        $request->logo_event->move(public_path('image'), $data['logo_event']);

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

    public function desc_event($id_event){
        $event_desc = Events::where('id',$id_event)->first();

        $event_participants = EventParticipants::where('id_event',$event_desc->id)
            ->whereNotNull('active_at')
            ->get();

        return view('subscribed.pages.club_event_club', 
            compact('event_desc','event_participants')
        );
    }


    public function list_participant($id_event){
        $event = Events::where('id',$id_event)->first();
        // dd($event_desc->id_club);
        $club_members = Pigeons::where('id_club', $event->id_club)->get();
        $event_participants = EventParticipants::where('id_event',$event->id)
            ->whereNotNull('active_at')
            ->get();

        $event_participant_pigeons = [];
        foreach ($event_participants as $event_participant) {
            array_push($event_participant_pigeons, $event_participant->id_pigeon);
        }

        return view('subscribed.pages.club_add_participant', 
            compact('event','club_members','event_participants','event_participant_pigeons')
        );
    }

    /**
     * Store event participants to storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addEventParticipants(Request $request)
    {
        $data = $request->all();
        $event = Events::where('id',$data['id_event'])->first();

        $event_participants = EventParticipants::where('id_event',$event->id)->get();

        foreach ($event_participants as $event_participant) {
            $event_participant->update(
                [
                    'active_at' => null
                ]
            );
        }

        if (isset($data['id_pigeons'])) {
            foreach ($data['id_pigeons'] as $key => $id_pigeon) {
                EventParticipants::updateOrCreate(
                    [
                        'id_pigeon' => $id_pigeon,
                        'id_event' => $event->id
                    ],
                    [
                        'is_core' => true,
                        'current_id_club' => $data['id_clubs'][$key],
                        'active_at' => now()
                    ]
                );
            }
        }

        return redirect('/club/event-club/'.$event->id)->with('Sukses','Berhasil menyimpan data!');
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
        $event = Events::find($id);
        $data = $request->all();

        if (isset($data['expired_time_event'])) {
            $data['expired_time_event'] = str_replace("T", " ", $request->expired_time_event);
        }

        $data['due_join_date_event'] = str_replace("T", " ", $request->due_join_date_event);
        $data['release_time_event'] = str_replace("T", " ", $request->release_time_event);

        if ($request->logo_event == null) {
            $data['logo_event'] = $event->logo_event;
        } else {
            $this->validate($request, [
                'logo_event' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $data['logo_event'] = 'logo-' . time().'.'.$request->logo_event->getClientOriginalExtension();
            $request->logo_event->move(public_path('image'), $data['logo_event']);
        }

        $event->update($data);

        return back()->with('Sukses','Berhasil mengubah data!');
    }

    /**
     * Close join event date now.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function closeJoin($id) 
    {
        $event = Events::find($id);
        $data['due_join_date_event'] = Carbon::now()->subSeconds(1);

        $event->update($data);
        
        return back()->with('Sukses','Berhasil menutup pendaftaran!');
    }

    /**
     * Start event now.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function startNow($id, $idHotspot) 
    {
        $event = Events::find($id);
        $dataEvent['due_join_date_event'] = Carbon::now()->subSeconds(2);

        $event->update($dataEvent);

        $hotspot = EventHotspot::find($idHotspot);

        $dataHostpot['release_time_hotspot'] = Carbon::now()->subSeconds(1);

        $hotspot->update($dataHostpot);

        return back()->with('Sukses','Berhasil memulai lomba!');
    }

    /**
     * Update the release time hotspot.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setReleaseTime(Request $request, $idHotspot) 
    {
        $hotspot = EventHotspot::find($idHotspot);
        $data = $request->all();

        $data['release_time_hotspot'] = str_replace("T", " ", $data['release_time_hotspot']);

        $hotspot->update($data);

        return back()->with('Sukses','Berhasil mengatur jadwal!');
    }

    public function addHotspot(Request $request)
    {
        $data = $request->all();

        if (isset($data['expired_time_hotspot'])) {
            $data['expired_time_hotspot'] = str_replace("T", " ", $request->expired_time_hotspot);
        }

        $data['release_time_hotspot'] = str_replace("T", " ", $request->release_time_hotspot);

        $hotspot['id_event'] = $data['id_event'];
        if (isset($data['expired_time_hotspot'])) {
            $hotspot['expired_time_hotspot'] = str_replace("T", " ", $data['expired_time_hotspot']);
        }
        $hotspot['release_time_hotspot'] = str_replace("T", " ", $data['release_time_hotspot']);
        EventHotspot::create($hotspot);

        // Tambah jumlah hotspot
        $event = Events::find($data['id_event']);

        $data['hotspot_length_event'] = $event->hotspot_length_event + 1;

        $event->update($data);

        return back()->with('Sukses','Berhasil mengubah data!');
    }

    public function updateHotspot(Request $request)
    {
        $data = $request->all();

        if (isset($data['expired_time_hotspot'])) {
            $data['expired_time_hotspot'] = str_replace("T", " ", $request->expired_time_hotspot);
        }

        $data['release_time_hotspot'] = str_replace("T", " ", $request->release_time_hotspot);

        $hotspot = [];

        for ($i=0; $i < count($data['ids']); $i++) {
            $hotspot['id'] = $data['ids'][$i];
            if (isset($data['expired_time_hotspots'][$i])) {
                $hotspot['expired_time_hotspot'] = str_replace("T", " ", $data['expired_time_hotspots'][$i]);
            }
            $hotspot['release_time_hotspot'] = str_replace("T", " ", $data['release_time_hotspots'][$i]);
            EventHotspot::find($hotspot['id'])->update($hotspot);
        }

        return back()->with('Sukses','Berhasil mengubah data!');
    }

    public function destroyHotspot($id, $id_event)
    {
        EventHotspot::find($id)->delete();

        // Kurangi jumlah hotspot
        $event = Events::find($id_event);

        $data['hotspot_length_event'] = $event->hotspot_length_event - 1;

        $event->update($data);

        return back()->with('Sukses','Berhasil menghapus hotspot!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Events::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
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
