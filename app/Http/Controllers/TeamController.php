<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\CMSMedsos;
use App\CMSFooter;

class TeamController extends Controller
{
    public function index(){
        $team = Team::all();
        $user = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        return view('subscribed.pages.team', [
        'team' => $team, 
        'users' => $user, 
        'data_medsos'=>$data_medsos,
            'data_footer'=>$data_footer,
        ]);
    }
}
