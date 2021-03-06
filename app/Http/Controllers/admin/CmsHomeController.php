<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CMSMedsos;
use App\CMSFooter;
use App\CMSHeader;
use App\CMSAbout;
use Illuminate\Support\Facades\DB;

class CmsHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.pages.cms-home');
    }
    public function header()
    {
        $data_medsos = CMSMedsos::all();
        $data_header = CMSHeader::all();
        $nama_website = CMSHeader::all();
        // dd($nama_website);
        return view('admin.pages.cms.cms-header',[
            'data_medsos'=>$data_medsos,
            'data_header'=>$data_header,
            'nama_website'=>$nama_website
            ]);
    }
    public function content()
    {
        
        return view('admin.pages.cms.cms-content');
    }
    public function footer()
    {
        $data_footer = CMSFooter::all();
        // dd($data_footer);
        return view('admin.pages.cms.cms-footer',['data_footer'=>$data_footer]);
    }

    public function medsos_create(Request $request)
    {
       $medsos = new CMSMedsos;
       $medsos->name_medsos = $request->name_medsos;
       $medsos->url_medsos = $request->url_medsos;
       $medsos->username_medsos = $request->username_medsos;
       $medsos->icon_medsos = $request->icon_medsos;
       
       try {
        $medsos->save();
    } catch(\Illuminate\Database\QueryException $e){
        $errorCode = $e->errorInfo[1];
        if($errorCode == '1062'){
            return back()->with('Gagal','Terdapat Data Ganda');
        }
    }

       return back()->with('Sukses','Data Berhasil diinputkan');
    }

    public function footer_create(Request $request)
    {
       try {
        CMSFooter::create($request->all());
    } catch(\Illuminate\Database\QueryException $e){
        $errorCode = $e->errorInfo[1];
        if($errorCode == '1062'){
            return back()->with('Gagal','Terdapat Data Ganda');
        }
    }

       return back()->with('Sukses','Data Berhasil diinputkan');
    }

    public function medsos_update(Request $request){
        $medsos = CMSMedsos::find($request->id);
        
        try {
            $medsos->update($request->all());
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return back()->with('Gagal','Terdapat Data Ganda');
            }
        }

        return back()->with('Sukses','Berhasil mengubah data!');
    }

    public function medsos_destroy($id)
    {
        CMSMedsos::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }

    public function footer_update(Request $request){
        $footer = CMSFooter::find($request->id);
        
        try {
            $footer->update($request->all());
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return back()->with('Gagal','Terdapat Data Ganda');
            }
        }

        return back()->with('Sukses','Berhasil mengubah data!');
    }

    public function footer_destroy($id)
    {
        CMSFooter::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }

    public function header_create(Request $request)
    {
        CMSHeader::create($request->all());

        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    public function header_destroy($id)
    {
        CMSHeader::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }

    public function header_update(Request $request){
        $header = CMSHeader::find($request->id);
        $header->update($request->all());

        return back()->with('Sukses','Berhasil mengubah data!');
    }


    public function header_update_title(Request $request){
        // $header = ::find($request->id);
        DB::table('cms_header')->update(['name_website' => $request->name_website]);
        return back()->with('Sukses','Berhasil mengubah data!');
    }


    // about us
    public function about_us()
    {
        $about = CMSAbout::all();
        return view('admin.pages.cms.cms-about-us',compact('about'));
    }

    public function about_us_create(Request $request)
    {
        CMSAbout::create($request->all());

        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    public function about_us_destroy($id)
    {
        CMSAbout::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }

    public function about_us_update(Request $request)
    {
        // dd($request->all());
        $about = CMSAbout::find($request->id);
        $about->update($request->all());

        return back()->with('Sukses','Berhasil mengubah data!');
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
    

    public function get_medsos()
    {
       
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
    
}
