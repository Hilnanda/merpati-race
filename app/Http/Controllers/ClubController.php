<?php

namespace App\Http\Controllers;
use App\CMSFooter;
use App\CMSMedsos;
use App\Clubs;
use App\User;
use App\CMSNews;
use App\CMSContact;
use DB;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $club = Clubs::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        $club_id = Clubs::where('id_user', auth()->user()->id)->get();
        $club_ikut = DB::table('club_members')
        ->join('clubs','club_members.id_club','=','clubs.id')
        ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        ->join('users','users.id','pigeons.id_user')
        ->where('pigeons.id_user', auth()->user()->id)
        ->get();
        return view('subscribed.pages.club',
        compact('users','club','data_medsos','data_footer','club_id','club_ikut')
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
