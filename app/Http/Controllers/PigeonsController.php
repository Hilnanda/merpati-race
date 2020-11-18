<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMSMedsos;
use App\CMSFooter;
use App\Pigeons;
use App\EventParticipants;
use App\EventHotspot;
use App\User;
use App\Events;
use App\Charts\StatisticsChart;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PigeonsController extends Controller
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
        $id_user = User::where('id',auth()->user()->id)->first();
        // dd($id_user);
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        return view('subscribed.pages.pigeon_index',compact('data_medsos','data_footer','id_user'));
    }
    public function update_name_loft($id_user,Request $request)
    {
       $data =  User::find($id_user)->update($request->all());
        // 
        return back()->with('Sukses','Berhasil Update Nama Loft!');
    }
    public function burungku()
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
            $event->countFrom = null;
            foreach ($event->event_hotspot as $hotspot) {
                if ($hotspot->release_time_hotspot) {
                    $event->countFrom = $this->formatDateCountdown($hotspot->release_time_hotspot);
                    $event->release_time_event = $this->formatDateLocal($hotspot->release_time_hotspot);
                    if ($hotspot->expired_time_hotspot) {
                        $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);
                    }
                    if ($event->release_time_event <= $current_datetime) {
                        break;
                    }
                }
            }
            $event->countTo = $this->formatDateCountdown($event->due_join_date_event);
            $event->due_join_date_event = $this->formatDateLocal($event->due_join_date_event);
            if ($event->release_time_event <= $current_datetime) {
                $event->status = 'Terbang';
                $event->color = '#32CD32';
                $event->countFrom = $event->countFrom;
                $event->countTo = $this->formatDateCountdown($event->current_datetime);
            } else {
                if ($event->due_join_date_event < $current_datetime) {
                    $event->status = 'Pendaftaran ditutup';
                    $event->color = '#EB0000';
                    $event->countFrom = $this->formatDateCountdown($event->current_datetime);
                    $event->countTo = $event->countFrom;
                } else {
                    $event->status = 'Pendaftaran dibuka';
                    $event->color = '#000000';
                    $event->countFrom = $this->formatDateCountdown($event->current_datetime);
                    $event->countTo = $event->countTo;
                }
            }
            if ($event->lat_event_end != null) {
                $event->distance = $this->distance($event->lat_event, $event->lng_event, $event->lat_event_end, $event->lng_event_end, "K");
            }
        }

        return view('subscribed.pages.pigeon_training', 
            compact('data_medsos','data_footer','users','events','current_datetime','title')
        );
        // $data_medsos = CMSMedsos::all();
        // $data_footer = CMSFooter::all();
        // $burung = Pigeons::where('id_user',auth()->user()->id)->get();

        // return view('subscribed.pages.pigeon_training', ['data_medsos'=>$data_medsos,'data_footer'=>$data_footer,'burung'=>$burung]);
    }
    public function formatDateCountdown($value)
    {
        return Carbon::parse($value)->format('Y m d H i s');
    }
    // public function formatDateLocal($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d\TH:i:s');
    // }
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
    public function detail($id)
    {
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $burung = Pigeons::find($id);
        $events = EventParticipants::with('events:id,name_event')->where('id_pigeon',$burung->id)->get();
        // dd($event);
        $statisticsChart = new StatisticsChart;
        $name_event = [];
        $speed = [];
        foreach ($events as $event) {
            array_push($name_event, $event->name_event);
            array_push($speed, $event->event_results->first()->speed_event_result);
        }

        $statisticsChart->labels($name_event);
        $statisticsChart->dataset('Rank events', 'line', $speed)
        ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)")
            ->fill(false)
            ->linetension(0.1)
            ->dashed([5]);
        // dd($statisticsChart);


        return view('subscribed.pages.pigeons-detail', ['data_medsos'=>$data_medsos,'data_footer'=>$data_footer,'bird'=>$burung,
    'statisticsChart' => $statisticsChart]);
    }
    public function topburung()
    {

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
        Pigeons::create($request->all());

        return back()->with('Sukses','Berhasil mendaftarkan burung!');
    }
    public function buat_training(Request $request)
    {
        $data = $request->all();

        $data['due_join_date_event'] = str_replace("T", " ", $request->due_join_date_event);
        $data['release_time_event'] = str_replace("T", " ", $request->release_time_event);

        $data['branch_event'] = "Training";

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
    public function formatDateLocal($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i:s');
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
    public function update(Request $request)
    {
        Pigeons::find($request->id)->update($request->all());

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
        Pigeons::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }

    public function id_training_pigeon($id_user)
    {
        Events::find($id_user);
        return view('subscribed.pages.pigeon_training');
    }
}
