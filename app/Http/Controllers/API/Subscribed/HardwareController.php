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
use App\ClubMember;
use App\Hardware;
use Carbon\Carbon;
use DateTime;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$hardware = Hardware::where('uid_hardware', $request->input('uid_hardware'))->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Hardware tidak terdaftar'
                )
            );
        }

        if ($hardware->label_hardware == 'admin') {
            return $this->pigeon_add_data($request);

        } else if ($hardware->label_hardware && $hardware->label_hardware == 'inkorf' && (strtotime(date("Y-m-d h:i:sa")) <= strtotime($hardware->tanggal_hardware))) {
            return $this->prosesInkorf($request);

        } else {
            return $this->publicRaceFinish($request);
        }
    }

    /**
     * Store pigeon to database.
     *
     * @return \Illuminate\Http\Response
     */
    public function pigeon_add_data(Request $request)
    {
        $data['uid_pigeon'] = $request->get('uid_pigeon');
     
        Pigeons::create($data);

        return response()->json($data);
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

        // is hardware exist?
        if (!$hardware = Hardware::where('uid_hardware', $input['uid_hardware'])
            ->where('label_hardware', 'inkorf')
            ->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Hardware tidak terdaftar pada Lomba Inkorf'
                )
            );
        }

        // is event exist?
        if (!$event = Events::where('id', $hardware->id_event)
            ->whereDate('due_join_date_event', '>=', Carbon::now())
            ->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Lomba dengan inkorf aktif tidak ditemukan'
                )
            );
        }

        // is pigeon exist?
        if (!$pigeon = Pigeons::where('uid_pigeon', $input['uid_pigeon'])->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Pigeon tidak ditemukan'
                )
            );
        }

        // is pigeon club member?
        if (!$pigeon_member = ClubMember::where('id_club', $event->id_club)->where('id_pigeon', $pigeon->id)->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Pigeon selain anggota club tidak bisa join lomba'
                )
            );
        }

        $data_event = [
            'id_pigeon' => $pigeon->id,
            'id_event' => $event->id,
            'current_id_club' => $pigeon_member->id_club,
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

        // is hardware exist?
        if (!$hardware = Hardware::where('uid_hardware', $input['uid_hardware'])
            ->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Hardware tidak terdaftar pada Lomba'
                )
            );
        }

        // is pigeon exist?
        if (!$pigeon = Pigeons::where('uid_pigeon', $input['uid_pigeon'])->with('club_member')->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Pigeon tidak ditemukan'
                )
            );
        }

        // is pigeon participant?
        if (!$participant = EventParticipants::where('current_id_club', $pigeon->club_member[0]->id_club)->where('id_pigeon', $pigeon->id)->orderBy('id', 'desc')->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Pigeon tidak terdaftar sebagai peserta lomba'
                )
            );
        }

        // is event exist?
        if (!$event = Events::where('id', $participant->id_event)
            ->whereDate('due_join_date_event', '<', Carbon::now())
            ->with('event_hotspot')
            ->first()) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Lomba dengan status terbang tidak ditemukan'
                )
            );
        }

        // get pigeon's fancier
        if (!$user = User::find($pigeon->id_user)) {
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Pemilik pigeon tidak ditemukan'
                )
            );
        }

        // FINISH PROCESS

        // get result
        $result = EventResults::where('id_event_participant', $participant->id)->first();

        // location validation
        $current_loc_from_home = $this->distance($user->lat_loft, $user->lng_loft, $input['lat'], $input['long'], 'K') * 1000;

        if ($current_loc_from_home > 100) { // tolerance = 100 meters
            return response()->json(
                array(
                    'code' => 404,
                    'message' => 'Pigeon tidak berada dalam lokasi finish yang tepat'
                )
            );
        }

        // get distance
        $distance = $this->distance($event->lat_event, $event->lng_event, $input['lat'], $input['long'], 'K') * 1000;

        // get time arrived
        $merged_time = $input['tahun'] . '-' . $input['bulan'] . '-' . $input['tgl'] . ' ' . $input['jam'] . ':' . $input['menit'] . ':' . $input['detik'];
        // $arrived_at_datetime = DateTime::createFromFormat("Y/m/d H:i:s", $merged_time);
        // $arrived_at = $arrived_at_datetime->getTimestamp();

        // get duration of flight
        $duration = strtotime($merged_time) - strtotime($event->event_hotspot[0]->release_time_hotspot);

        // count speed of finished pigeon
        $speed_event_result = $distance / ($duration / 60);

        $data_result = [
            'speed_event_result' => $speed_event_result
        ];

        $result->update($data_result);

        return response()->json(EventResults::find($result->id));
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

    /**
     * Count the distance from long lat.
     *
     * @param  double  $lat1
     * @param  double  $lon1
     * @param  double  $lat2
     * @param  double  $lon2
     * @param  string  $unit
     * @return \Illuminate\Http\Response
     */
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
            } else { // $unit == "M"
                return $miles;
            }
        }

        // echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
        // echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
        // echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
    }


}
