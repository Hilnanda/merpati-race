<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMSMedsos;
use App\CMSFooter;
use App\Pigeons;
use App\EventParticipants;
use App\User;
use App\Events;
use App\Charts\StatisticsChart;


class PigeonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        return view('subscribed.pages.pigeons-index', ['data_medsos'=>$data_medsos,'data_footer'=>$data_footer]);
    }

    public function burungku()
    {
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $burung = Pigeons::where('id_user',auth()->user()->id)->get();

        return view('subscribed.pages.pigeons-burungku', ['data_medsos'=>$data_medsos,'data_footer'=>$data_footer,'burung'=>$burung]);
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
