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

class LoftController extends Controller
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
     * Store a pigeon to event participants.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inkorfAdd(Request $request, $id, $uid)
    {
        $input = $request->all();
   
        $this->validate($request, [
            'user.email' => 'required|email',
            'user.password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['user']['email'], 'password' => $input['user']['password'])))
        {
            if (auth()->user()->type_user == '2') {
                if (!$event = Events::find($id)) {
                    return response()->json(
                        array(
                            'code' => 404,
                            'message' => 'Lomba tidak ditemukan'
                        )
                    );
                }

                if (!$pigeon = Pigeons::where('uid_pigeon', $uid)->first()) {
                    return response()->json(
                        array(
                            'code' => 404,
                            'message' => 'Pigeon tidak ditemukan'
                        )
                    );
                }

                if (!$loft_member = LoftMember::where('id_loft', $event->id_loft)->where('id_pigeon', $pigeon->id)->first()) {
                    return response()->json(
                        array(
                            'code' => 404,
                            'message' => 'Pigeon bukan anggota loft pemilik lomba'
                        )
                    );
                } else {
                    $data = [
                        'id_pigeon' => $pigeon->id,
                        'id_event' => $id,
                        'is_core' => 1,
                        'active_at' => now()
                    ];

                    $id_participant = EventParticipants::create($data)->id;

                    return response()->json(EventParticipants::find($id_participant));
                }
            }else{
                return response()->json(
                    array(
                        'code' => 403,
                        'message' => 'Akses hanya bisa dilakukan oleh pemilik loft.'
                    )
                );
            }
        }else{
            return response()->json(
                array(
                    'code' => 401,
                    'message' => 'Akun gagal dikenali.'
                )
            );
        }
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
