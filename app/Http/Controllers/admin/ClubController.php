<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Clubs;
use App\User;
use Illuminate\Http\Request;
use DOMDocument;
use DOMXPath;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club = Clubs::all();
        $user = User::all();
        
        // $url = "https://www.countryflags.io/";
  
        // $html = file_get_contents($url);
        // $xpath = new DOMDocument();
  
        // libxml_use_internal_errors(true);
  
        // if (!empty($html)) {
        //     $xpath -> loadHTML($html);
  
        //     libxml_clear_errors();
        //     $xpath = new DOMXPath($xpath);
  
        //     $bendera = $xpath -> query('//*[@id="countries"]/div/div[1]/div/img/@src');
        //     $nama = $xpath -> query('//*[@id="countries"]/div/div[1]/div/p[2]');
        //     $code = $xpath -> query('//*[@id="countries"]/div/div[1]/div/p[1]');
            
        //     }
        //     $arraySubClass = array();
            
        //     foreach ($code as $value) {
        //           $code_negara[] = array('code'=>$value->nodeValue);
        
        //     }
        //     foreach ($bendera as $value) {
        //         $bendera_negara[] = array('bendera'=>$value->nodeValue);
        
        //     }
  
        //     $i = 0;
        //     foreach ($nama as $value) {
        //         $nama_negara[] = array(
        //             'code'=> $code_negara[$i]['code'],
        //             'bendera'=> $bendera_negara[$i]['bendera'],
        //             'nama'=>$value->nodeValue
        //         );
        //         $i++;
        //     }
            
            
            // dd($obj);
        return view('admin.pages.list-club', ['clubs' => $club, 'users' => $user,
        // 'negara'=>$obj
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $data['manager_club'] = $request->id_user;
        Clubs::create($data);
        // $Clubs = Clubs::create($data);

        // $Clubs->id_user = $request->id_user;
        // $Clubs->name_club = $request->name_club;
        // $Clubs->lat_club = $request->lat_club;
        // $Clubs->lng_club = $request->lng_club;
        // $Clubs->address_club = $request->address_club;
        // $Clubs->manager_club = $request->id_user;


        return back()->with('Sukses','Berhasil menambahkan data!');
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
    public function edit(Request $request)
    {
        // dd($request->all());
        $club = Clubs::find($request->id);
        // dd($club);
        $club->update($request->all());

        return back()->with('Sukses','Berhasil mengubah data!');
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
        Clubs::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }
}
