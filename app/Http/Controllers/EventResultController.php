<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMSFooter;
use App\CMSMedsos;
use App\User;
use App\EventResults;
use Carbon\Carbon;

class EventResultController extends Controller
{
    protected $relationships = ['event_participant', 'event_hotspot'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Hasil Lomba';
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        $current_datetime = Carbon::now();

        $event_results = EventResults::with($this->relationships)
        ->where("event_results.speed_event_result", "!=", null)
        ->get();

        $all_event_results = EventResults::with($this->relationships)
        ->orderBy("event_results.speed_event_result","desc")
        ->where("event_results.speed_event_result", "!=", null)
        ->get();

        foreach ($event_results as $key => $event_result) {
            $rank = 1;
            foreach ($all_event_results as $all_key => $all_event_result) {
                if ($event_result->event_participant->id_event == $all_event_result->event_participant->id_event) {
                    if ($event_result->id_event_participant == $all_event_result->id_event_participant) {
                        $event_result->rank = $rank;
                    }
                    $rank++;
                }
            }
        }

        return view('subscribed.pages.results_content', 
            compact('data_medsos','data_footer','users','current_datetime','title','event_results')
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
