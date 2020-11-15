<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Loft;
use App\User;
use Illuminate\Http\Request;

class LoftController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$title = 'One Loft Race';
    	$current_user = auth()->user();
    	$loft_owns = Loft::where('id_user', $current_user->id)
    	->orderBy('lofts.id', 'desc')
    	->get();

    	foreach ($loft_owns as $loft) {
    		if (count($loft->event) > 0) {
                $loft->distance = $this->distance($loft->event[0]->lat_event, $loft->event[0]->lng_event, $loft->event[0]->lat_event_end, $loft->event[0]->lng_event_end, "K");
            }
    	}

    	$users = User::all();

    	return view('one_loft_race.pages.one_loft',
    		compact('title', 'lofts', 'users', 'loft_owns')
    	);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
    	$data = $request->all();

    	$this->validate($request, [
    		'logo_loft' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	]);

    	$data['logo_loft'] = 'loft-' . time().'.'.$request->logo_loft->getClientOriginalExtension();
    	$request->logo_loft->move(public_path('image'), $data['logo_loft']);

    	Loft::create($data);

    	return back()->with('Sukses','Berhasil menambahkan data!');
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
    public function edit(Request $request)
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
    	$loft = Loft::find($id);
    	$data = $request->all();

    	if ($request->logo_loft == null) {
    		$data['logo_loft'] = $loft->logo_loft;
    	} else {
    		$this->validate($request, [
    			'logo_loft' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		]);

    		$data['logo_loft'] = 'loft-' . time().'.'.$request->logo_loft->getClientOriginalExtension();
    		$request->logo_loft->move(public_path('image'), $data['logo_loft']);
    	}

    	$loft->update($data);

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
    	Loft::find($id)->delete();

    	return back()->with('Sukses','Berhasil menghapus data!');
    }

    public function formatDateLocal($value)
    {
    	return Carbon::parse($value)->format('Y-m-d\TH:i:s');
    }

    public function formatDateCountdown($value)
    {
    	return Carbon::parse($value)->format('Y m d H i s');
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