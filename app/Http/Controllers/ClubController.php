<?php

namespace App\Http\Controllers;
use App\CMSFooter;
use App\CMSMedsos;
use App\Clubs;
use App\User;
use App\CMSNews;
use App\CMSContact;
use App\ClubMember;
use App\OperatorClubs;
use DB;
use App\Pigeons;
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
        $club = DB::table('club_members')
        ->rightjoin('clubs','club_members.id_club','=','clubs.id')
        ->where('clubs.id_user','=',auth()->user()->id)
        ->get();
        
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $auth_session = auth()->user()->id;
        $pigeon = Pigeons::where('pigeons.is_active', 1)
        ->where('pigeons.id_user', auth()->user()->id)
        ->whereRaw('pigeons.id NOT IN (SELECT id_pigeon FROM club_members)')
        ->get();
        $clubku = Clubs::where('id_user', auth()->user()->id)
        ->orwhere('manager_club',auth()->user()->id)
        ->get();

        $club_id = DB::select('select * from clubs order by name_club');
        
        
        $club_ikut = DB::table('clubs')
        ->join('club_members','club_members.id_club','=','clubs.id')
        ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        ->join('users', 'users.id', '=', 'pigeons.id_user')
        ->where('pigeons.id_user', auth()->user()->id)
        ->where('club_members.is_active', 1)
        ->get();
       // dd($club_ikut);
       $club_belum_ikut = Clubs::select('clubs.*');
        return view('subscribed.pages.club',
        compact('users','club','data_medsos','data_footer','club_id','club_ikut','club_belum_ikut','clubku','pigeon')
        );
    }

    public function detail_ikut($id)
    {
        $club = Clubs::find($id);
        $users = User::all();
        $clubs= Clubs::where('id_user', auth()->user()->id)->get();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $list_pigeons = DB::table('club_members')
        ->join('clubs','club_members.id_club','=','clubs.id')
        ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        ->join('users','users.id','pigeons.id_user')
        ->where('pigeons.id_user', auth()->user()->id)->get();
        return view('subscribed.pages.club_detail_ikut',compact('club','data_medsos','data_footer','users','clubs','list_pigeons'));
    }
    public function detail_saya($id)
    {
        // dd($id);
        
        $club = Clubs::find($id);
        $users = User::all();
        $clubs= Clubs::where('id',$id)
        ->first();

        $operator = DB::table('club_members')
        ->select('clubs.*','users.*','pigeons.*','pigeons.id_user as user_id')
        ->join('clubs','club_members.id_club','=','clubs.id')
        ->join('pigeons', 'pigeons.id', '=', 'club_members.id_pigeon')
        ->join('users', 'pigeons.id_user', '=', 'users.id')
        ->where('club_members.id_club', $id)
        ->get();
        
        // dd($clubs->manager_club);
        // dd($clubs);
        if($clubs->manager_club==auth()->user()->id){
            
            $clubs= Clubs::where('manager_club', auth()->user()->id)
        ->where('id',$id)
        ->first();
        } else {
            $clubs= Clubs::where('id_user', auth()->user()->id)
        ->where('id',$id)
        ->first();
        }
        $data = ClubMember::find($id);
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();

        return view('subscribed.pages.club_saya_detail',compact('club','data_medsos','data_footer','users','clubs','data','operator'));
    }
    public function detail_belum_ikut($id)
    {
        $club = Clubs::where('id','=',$id)        
        ->get();
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all(); 
        $pigeon = DB::select('select * from pigeons where is_active = 1');
        // dd($pigeon);
        $club_ikut = DB::table('clubs')
        ->join('club_members','club_members.id_club','=','clubs.id')
        ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        ->join('users', 'users.id', '=', 'pigeons.id_user')
        ->where('pigeons.id_user', auth()->user()->id)
        ->get();
        // dd($club_ikut);
        return view('subscribed.pages.club_detail_belum_ikut',compact('club','data_medsos','data_footer','users','club_ikut','pigeon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function join_club(Request $request)
    {
         $data = $request->all();

        $data['is_active'] = 0;

        ClubMember::create($data);
    //    $data =  ClubMember::create($request->all());
       
        return back()->with('Sukses','Berhasil menambahkan data!');
        
    }
    public function join_operator(Request $request)
    {
        OperatorClubs::create($request->all());
    //    $data =  ClubMember::create($request->all());
       
        return back()->with('Sukses','Berhasil menambahkan data!');
        
    }
    public function manager(){
       return redirect('/');
    }
    // public function manager($id){
    //     $data = ClubMember::find($id);
    //     return view('subscribed.pages.club_manager',compact('data'));
    // }

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
