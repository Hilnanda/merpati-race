<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pigeons;
use App\Hardware;

class ApiPigeonController extends Controller
{
    public $relation_pigeon = ['users','club','Event_participants','loft_member'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Pigeons::with($this->relation_pigeon)->get());
    }

    public function pigeon_add_data(Request $request)
    {
        $data['uid_pigeon'] = $request->get('uid_pigeon');
     
        Pigeons::create($data);

        return response()->json($data);
    }

    public function add_hardware(Request $request)
    {
        $data['uid_hardware'] = $request->get('uid_hardware');
        $data['uid_pigeon'] = $request->get('uid_pigeon');
        $data['tanggal_hardware'] = $request->get('tgl'). '/'.$request->get('bulan'). '/'.$request->get('tahun'). ' '.$request->get('jam'). ':'.$request->get('menit'). ':'.$request->get('detik');
        $data['longlat_hardware'] = $request->get('long').','.$request->get('lat');

        Hardware::create($data);

        return response()->json($data);
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
        $clubMember = Pigeons::create($request->all())->id;

        return response()->json(Pigeons::find($clubMember));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Pigeons::with($this->relation_pigeon)->findOrFail($id));
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
        $clubMember = Pigeons::find($id);
        $clubMember->update($request->all());

        return response()->json(Pigeons::find($id));
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
        return response()->json('Delete Success');
    }
}
