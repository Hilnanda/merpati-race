<?php

namespace App\Http\Controllers\API\Subscribed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Loft;
use App\LoftMember;
use App\User;
use App\Pigeons;
use App\Events;
use App\EventParticipants;
use App\EventResults;
use App\EventHotspot;
use App\Hardware;
use Carbon\Carbon;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Get message from hardware.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMessage($message)
    {
        $event = Events::first();

        $input['address_event'] = $message;

        $event->update($input);

        return response()->json(Events::find($event->id));
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
     * Inkorf pigeon from hardware.
     *
     * @return \Illuminate\Http\Response
     */
    public function prosesInkorf(Request $request)
    {
        $input = $request->all();

        if (!$event = Events::where('id', $input['id_event'])
            ->whereDate('due_join_date_event', '>=', Carbon::now())
            ->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Lomba dengan inkorf aktif tidak ditemukan'
                )
            );
        }

        if (!$hardware = Hardware::where('uid_hardware', $input['uid_hardware'])
            ->where('id_event', $input['id_event'])
            ->where('label_hardware', 'inkorf')
            ->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Hardware tidak terdaftar pada Lomba Inkorf'
                )
            );
        }

        if (!$pigeon = Pigeons::where('uid_pigeon', $input['uid_pigeon'])->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Pigeon tidak ditemukan'
                )
            );
        }

        $data_event = [
            'id_pigeon' => $pigeon->id,
            'id_event' => $event->id,
            'is_core' => 1,
            'active_at' => now(),
        ];

        $event_participant = EventParticipants::create($data_event);

        $data_result = [
            'id_event_participant' => $event_participant->id,
            'id_event_hotspot' => $event->event_hotspot[0]->id,
        ];

        EventResults::create($data_result);

        return response()->json(EventParticipants::find($event_participant->id));
    }

    /**
     * Update event speed result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publicRaceFinish(Request $request)
    {
        $input = $request->all();

        
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
