<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hardware;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
    }

    /**
     * Update api status on events.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setStatus(Request $request)
    {
        $input = $request->all();

        for ($i=0; $i < count($input['uid_hardware']); $i++) { 
            if (isset($input['id_event'])) {
                Hardware::updateOrCreate(
                    [
                        'id_event' => $input['id_event'],
                        'label_hardware' => $input['label_hardware'][$i]
                    ],
                    [
                        'uid_hardware' => $input['uid_hardware'][$i],
                        'is_active' => $input['is_active'][$i]
                    ]
                );
            } else {
                Hardware::updateOrCreate(
                    [
                        'id_user' => $input['id_user'],
                        'label_hardware' => $input['label_hardware'][$i]
                    ],
                    [
                        'uid_hardware' => $input['uid_hardware'][$i],
                        'is_active' => $input['is_active'][$i]
                    ]
                );
            }
        }

        return back()->with('Sukses',"Berhasil set status api hardware!");
    }

    /**
     * Set hardware for Inkorf.
     *
     * @return \Illuminate\Http\Response
     */
    public function setInkorf(Request $request)
    {
        $input = $request->all();

        $hardware = Hardware::where('uid_hardware', $input['uid_hardware']);

        $hardware->update([
                // 'uid_hardware' => $input['uid_hardware'],
                'id_event' => $input['id_event'],
                'label_hardware' => $input['label_hardware'],
                'tanggal_hardware' => $input['tanggal_hardware']
            ]);

        return back()->with('Sukses',"Berhasil set status api hardware inkorf!");
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
