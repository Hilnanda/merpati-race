<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use App\User;
use Illuminate\Support\Facades\DB;

class ListTeamController extends Controller
{
    public function index(){
        $team = Team::all();
        $user = User::all();
        return view('admin.pages.list-team', [
        'team' => $team, 
        'users' => $user, 
        ]);
    }

    public function create(Request $request)
    {
        // dd($request->all());
        Team::create($request->all());

        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    public function edit(Request $request)
    {
        // dd($request->all());

        $team = Team::find($request->id);
        $team->update($request->all());

        return back()->with('Sukses','Berhasil mengubah data!');
    }
    public function verifikasi($id)
    {
        // dd($request->all());

        $team = DB::table('teams')->where('id',$id)->update([
            'is_active' => 1
        ]);
        
        return back()->with('Sukses','Berhasil mengubah data!');
    }

    public function destroy($id)
    {
        Team::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }
}
