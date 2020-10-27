<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\CMSMedsos;
use App\CMSFooter;
use App\TeamMembers;
use App\Clubs;
use DB;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::where('teams.is_active', 1)
        ->get();
        $club = DB::table('team_members')
        ->rightJoin('clubs', 'team_members.id_club', '=', 'clubs.id')
        ->where('clubs.id_user','=',auth()->user()->id)
        ->get();
        // dd($club);
        $user = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $auth_session = auth()->user()->id;

        $teamku = Team::where('id_user', auth()->user()->id)
            ->where('teams.is_active', 1)
            ->get();

        $team_ikut = DB::table('team_members')
            ->join('teams', 'team_members.id_team', '=', 'teams.id')
            ->join('clubs', 'team_members.id_club', '=', 'clubs.id')
            ->join('users', 'users.id', '=', 'clubs.id_user')
            ->where('clubs.id_user', auth()->user()->id)
            ->where('teams.is_active', 1)
            ->get();
        // dd($team_ikut);

        // $teamku = TeamMembers::where('id_user',auth()->user()->id)->get();
        // dd($teamku);
        return view('subscribed.pages.team', [
            'team' => $team,
            'users' => $user,
            'data_medsos' => $data_medsos,
            'data_footer' => $data_footer,
            'teamku' => $teamku,
            'team_ikut' => $team_ikut,
            'auth' => $auth_session,
            'club'=>$club
        ]);
    }

    public function team_create(Request $request)
    {
        Team::create($request->all());

        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    public function join_team(Request $request)
    {
        // dd($request->all());
        TeamMembers::create($request->all());

        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    public function details_ikut($id)
    {
        $team = Team::where('id','=',$id)
        ->where('is_active', 1)
        ->get();
        $user = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        $team_ikut = DB::table('team_members')
            ->join('teams', 'team_members.id_team', '=', 'teams.id')
            ->join('clubs', 'team_members.id_club', '=', 'clubs.id')
            ->join('users', 'users.id', '=', 'clubs.id_user')
            ->select('team_members.*','teams.*','clubs.*','users.*','teams.is_active as is_active_teams')
            ->where('team_members.id_team', $id)
            ->get();
        // dd($team_ikut);
        return view('subscribed.pages.team-ikut-detail', [
            'team' => $team,
            'users' => $user,
            'data_medsos' => $data_medsos,
            'data_footer' => $data_footer,
            'team_ikut' => $team_ikut,
        ]);
    }

    public function details_saya($id)
    {
        // dd($id);
        $team = Team::where('id','=',$id)
        ->where('is_active', 1)
        ->get();
        
        $user = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        $team_ikut = DB::table('team_members')
            ->join('teams', 'team_members.id_team', '=', 'teams.id')
            ->join('clubs', 'team_members.id_club', '=', 'clubs.id')
            ->join('users', 'users.id', '=', 'clubs.id_user')
            ->select('team_members.*','teams.*','clubs.*','users.*','teams.is_active as is_active_teams')
            ->where('team_members.id_team', $id)
            ->get();
        // dd($team_ikut);
        return view('subscribed.pages.team-saya-detail', [
            'team' => $team,
            'users' => $user,
            'data_medsos' => $data_medsos,
            'data_footer' => $data_footer,
            'team_ikut' => $team_ikut,
        ]);
    }
}
