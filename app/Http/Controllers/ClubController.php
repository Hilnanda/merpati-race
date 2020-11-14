<?php

namespace App\Http\Controllers;
use App\CMSFooter;
use App\CMSMedsos;
use App\Clubs;
use App\User;
use App\CMSNews;
use App\CMSContact;
use App\ClubMember;
use App\Events;
use App\Loft;
use App\OperatorClubs;
use DB;
use App\Pigeons;
use Carbon\Carbon;
use App\EventParticipants;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    protected $relationships = ['event_participants', 'event_hotspot', 'club', 'user'];
    protected $event_results_relationships = ['event_participant', 'event_hotspot'];
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
        $loft = Loft::where('pigeons.is_active', 1)
        ->where('id_user', auth()->user()->id)
        ->whereRaw('pigeons.id NOT IN (SELECT id_pigeon FROM club_members)')
        ->get();
        $clubku = Clubs::where('id_user', auth()->user()->id)
        ->orwhere('manager_club',auth()->user()->id)
        ->get();

        $club_id = DB::select('select * from clubs order by name_club');
        
        
        $club_ikut = ClubMember::
        // ->select('clubs.*','users.*','pigeons.*','clubs.id_user as operator_id')
        // ->join('club_members','club_members.id_club','=','clubs.id')
        // ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        // ->join('users', 'users.id', '=', 'pigeons.id_user')
        whereHas('pigeon', function($q){
            $q->where('id_user', auth()->user()->id);
         })
        // where('pigeons.id_user', auth()->user()->id)
        ->where('is_active', 1)
        ->get();
       // dd($club_ikut);
       $club_belum_ikut = Clubs::select('clubs.*');
        return view('subscribed.pages.club',
        compact('users','club','data_medsos','data_footer','club_id','club_ikut','club_belum_ikut','clubku','loft')
        );
    }




    public function detail_ikut($id)
    {
        $club = Clubs::find($id);
        $users = User::all();
        $clubs= Clubs::where('id',$id)
        ->first();        
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $list_pigeons = ClubMember::
        // ->join('clubs','club_members.id_club','=','clubs.id')
        // ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        // ->join('users','users.id','pigeons.id_user')
        where('id_club', $id)->get();

        $clubku = Clubs::where('id','=',$id)        
        ->get();
        
        $pigeon = Pigeons::where('pigeons.is_active', 1)
        ->where('pigeons.id_user', auth()->user()->id)
        ->whereRaw('pigeons.id NOT IN (SELECT id_pigeon FROM club_members)')
        ->get();
        $operator = OperatorClubs::where('id_user',auth()->user()->id)
        ->first();

        $join_operator = DB::table('operator_clubs')
        ->select('clubs.*','users.*','operator_clubs.*','operator_clubs.id as operator_id')
        ->join('clubs','operator_clubs.id_club','=','clubs.id')
        ->join('users', 'operator_clubs.id_user', '=', 'users.id')
        ->where('operator_clubs.id_club', $id)
        ->get();

        return view('subscribed.pages.club_detail_ikut',compact('pigeon','clubku','club','data_medsos','data_footer','users','clubs','list_pigeons','join_operator','operator'));
    }



    public function detail_saya($id)
    {
        // dd($id);
        // event
        $events = Events::with($this->relationships)
        ->where('branch_event', 'Club')
        ->where('id_club', $id)
        ->orderBy('events.id', 'desc')->get();

        $event_clubs = Events::find($id); 
        // dd($event_clubs);
        $current_datetime = Carbon::now();

        foreach ($events as $event) {
            $event->release_time_event = null;
            $event->expired_time_event = null;
            foreach ($event->event_hotspot as $hotspot) {
                if ($hotspot->release_time_hotspot) {
                    $event->release_time_event = $this->formatDateLocal($hotspot->release_time_hotspot);
                    if ($hotspot->expired_time_hotspot) {
                        $event->expired_time_event = $this->formatDateLocal($event->expired_time_event);
                    }
                    if ($event->release_time_event <= $current_datetime) {
                        break;
                    }
                }
            }
            $event->due_join_date_event = $this->formatDateLocal($event->due_join_date_event);
            if ($event->release_time_event <= $current_datetime) {
                $diff = strtotime($current_datetime) - strtotime($event->release_time_event);
                $days = floor($diff / 86400);
                $hours = floor($diff / 3600) % 24;
                $minutes = floor($diff / 60) % 60;
                $seconds = $diff % 60;

                $event->status = 'Terbang (' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                $event->color = '#32CD32';
            } else {
                if ($event->due_join_date_event < $current_datetime) {
                    $diff = strtotime($event->release_time_event) - strtotime($current_datetime);
                    $days = floor($diff / 86400);
                    $hours = floor($diff / 3600) % 24;
                    $minutes = floor($diff / 60) % 60;
                    $seconds = $diff % 60;

                    $event->status = 'Pendaftaran ditutup (-' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                    $event->color = '#EB0000';
                } else {
                    $diff = strtotime($event->due_join_date_event) - strtotime($current_datetime);
                    $days = floor($diff / 86400);
                    $hours = floor($diff / 3600) % 24;
                    $minutes = floor($diff / 60) % 60;
                    $seconds = $diff % 60;

                    $event->status = 'Belum dimulai (-' . ($days * 24 + $hours) . 'j:' . $minutes . 'm:' . $seconds . 'd)';
                    $event->color = '#000000';
                    // $date = strtotime($event->release_time_event);
                    // $event->status = $date - time();
                }
            }
            if ($event->lat_event_end != null) {
                $event->distance = $this->distance($event->lat_event, $event->lng_event, $event->lat_event_end, $event->lng_event_end, "K");
            }
        }


        // club
        $club = Clubs::find($id);
        $users = User::all();
        $clubs= Clubs::where('id',$id)
        ->first();

        $list_pigeons = ClubMember::
        // ->join('clubs','club_members.id_club','=','clubs.id')
        // ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        // ->join('users','users.id','pigeons.id_user')
        where('id_club', $id)->get();

        $clubku = Clubs::where('id','=',$id)        
        ->get();
        
        $pigeon = Pigeons::where('pigeons.is_active', 1)
        ->where('pigeons.id_user', auth()->user()->id)
        ->whereRaw('pigeons.id NOT IN (SELECT id_pigeon FROM club_members)')
        ->get();

        $operator = DB::table('club_members')
        ->select('users.name','users.username','users.id')
        ->join('clubs','club_members.id_club','=','clubs.id')
        ->join('pigeons', 'pigeons.id', '=', 'club_members.id_pigeon')
        ->join('users', 'pigeons.id_user', '=', 'users.id')
        ->where('club_members.id_club', $id)
        ->whereRaw('users.id NOT IN (SELECT id_user FROM operator_clubs)')
        ->where('users.id','!=', auth()->user()->id)
        ->groupByRaw('users.name, users.username ,users.id')
        ->get();

        $join_operator = DB::table('operator_clubs')
        ->select('clubs.*','users.*','operator_clubs.*','operator_clubs.id as operator_id')
        ->join('clubs','operator_clubs.id_club','=','clubs.id')
        ->join('users', 'operator_clubs.id_user', '=', 'users.id')
        ->where('operator_clubs.id_club', $id)
        ->get();

        $results = EventParticipants::selectRaw('*, event_results.created_at as event_results_created_at, event_results.speed_event_result as event_results_speed_event_result, clubs.id as clubs_id, clubs.name_club as clubs_name_club, teams.id as teams_id, teams.name_team as teams_name_team')
        ->leftJoin('clubs', 'event_participants.current_id_club', '=', 'clubs.id')
        ->leftJoin('teams', 'event_participants.current_id_team', '=', 'teams.id')
        ->leftJoin('event_results', 'event_participants.id', '=', 'event_results.id_event_participant')
        ->where('event_participants.active_at', '!=', 'null')
        ->where('event_participants.current_id_club', '=', $id)
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

        
        return view('subscribed.pages.club_saya_detail',compact('pigeon','clubku','club','data_medsos','data_footer','users','clubs','data','operator','join_operator','list_pigeons','id','results','event_clubs','events','current_datetime'));
    }


    public function formatDateLocal($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i:s');
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



    public function detail_belum_ikut($id)
    {
        $club = Clubs::where('id','=',$id)        
        ->get();
        
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all(); 
        // $pigeon = DB::select('select * from pigeons where is_active = 1');
        // dd($pigeon);
        $club_ikut = DB::table('clubs')
        ->join('club_members','club_members.id_club','=','clubs.id')
        ->join('pigeons','club_members.id_pigeon','=','pigeons.id')
        ->join('users', 'users.id', '=', 'pigeons.id_user')
        ->where('pigeons.id_user', auth()->user()->id)
        ->get();
        // dd($club_ikut);
        $pigeon = Pigeons::where('pigeons.is_active', 1)
        ->where('pigeons.id_user', auth()->user()->id)
        ->whereRaw('pigeons.id NOT IN (SELECT id_pigeon FROM club_members)')
        ->get();
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
    public function destroy_operator($id)
    {
        OperatorClubs::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
       
        
    }
    public function join_operator(Request $request)
    {
        OperatorClubs::create($request->all());
    //    $data =  ClubMember::create($request->all());
       
        return back()->with('Sukses','Berhasil menambahkan data!');
        
    }
    public function manager($id){
        $akun = ClubMember::find($id);
        $users = User::all();
        $data_medsos = CMSMedsos::all();
        $data_footer = CMSFooter::all();
        $acc = DB::table('club_members')
        ->join('clubs','club_members.id_club','=','clubs.id')
        ->join('pigeons', 'pigeons.id', '=', 'club_members.id_pigeon')
        ->join('users', 'users.id', '=', 'pigeons.id_user')
        ->select('club_members.*','pigeons.*','clubs.*','users.*','club_members.id as id_club_is_active_0')
        ->where('club_members.is_active',0)
        ->where('clubs.id', $id)
        ->get();
        // dd($acc);
       return view('subscribed.pages.club_acc_gabung',compact('acc','akun','users','data_medsos','data_footer'));
    }
   public function acc_club($id){
   $edit_is_active = DB::update('update club_members set is_active = 1 where club_members.id = ?',[$id]);    
   return back()->with('Sukses','Berhasil Update data!');
   }
   public function del_club($id){
       $hapus_acc_club = ClubMember::find($id);
       $hapus_acc_club->delete($hapus_acc_club);
       return back()->with('Sukses','Berhasil Delete data!');
   }
   public function add_lomba(){

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
