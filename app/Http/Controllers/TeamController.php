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
        $team = Team::all();
        $user = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        $teamku = Team::where('id_user', auth()->user()->id)->get();
        $team_ikut = DB::table('team_members')
            ->join('teams', 'team_members.id_team', '=', 'teams.id')
            ->join('clubs', 'team_members.id_club', '=', 'clubs.id')
            ->join('users', 'users.id', '=', 'clubs.id_user')
            ->where('clubs.id_user', auth()->user()->id)
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
        ]);
    }

    public function details_ikut($id)
    {
        $team = Team::all();
        $user = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        $team_ikut = DB::table('team_members')
            ->join('teams', 'team_members.id_team', '=', 'teams.id')
            ->join('clubs', 'team_members.id_club', '=', 'clubs.id')
            ->join('users', 'users.id', '=', 'clubs.id_user')
            ->where('team_members.id_team', $id)
            ->get();

        return view('subscribed.pages.team-ikut-detail', [
            'team' => $team,
            'users' => $user,
            'data_medsos' => $data_medsos,
            'data_footer' => $data_footer,
            'team_ikut' => $team_ikut,
        ]);
    }
}
