<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;

class ListTeamController extends Controller
{
    public function index(){
        $team = Team::all();
        return view('admin.pages.list-team', [
        'team' => $team, 
        ]);
    }
}
