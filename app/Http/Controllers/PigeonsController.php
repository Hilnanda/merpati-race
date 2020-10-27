<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CMSMedsos;
use App\CMSFooter;
use App\Pigeons;


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
}
