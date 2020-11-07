<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events;
use App\Pigeons;
use App\EventHotspot;
use App\EventResults;
use App\EventParticipants;
use App\CLubMember;
use App\TeamMembers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class EventController extends Controller
{
    use AuthenticatesUsers;

    protected $relationships = ['event_participants', 'event_hotspot', 'club', 'user'];
    protected $event_results_relationships = ['event_participant', 'event_hotspot'];
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
     * Update lng and lat of events.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEventLocation(Request $request, $id)
    {
        $input = $request->all();
   
        $this->validate($request, [
            'user.email' => 'required|email',
            'user.password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['user']['email'], 'password' => $input['user']['password'])))
        {
            if (auth()->user()->type_user == '1') {
                $event = Events::find($id);

                $event->update($input);

                return response()->json(Events::find($id));
            }else{
                return response()->json(
                    array(
                        'code' => 403,
                        'message' => 'Akses hanya bisa dilakukan oleh admin.'
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
