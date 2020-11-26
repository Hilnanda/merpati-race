<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Loft;
use App\User;
use Illuminate\Http\Request;

class LoftController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lofts = Loft::orderBy('lofts.id', 'desc')
            ->get();

        $users = User::all();

        $json = file_get_contents('https://restcountries.eu/rest/v2/all');
        $countries = json_decode($json);

        return view('admin.pages.list-loft', 
            compact('lofts','users','countries')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $data = $request->all();

        $this->validate($request, [
            'logo_loft' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['logo_loft'] = 'loft-' . time().'.'.$request->logo_loft->getClientOriginalExtension();
        $request->logo_loft->move(public_path('image'), $data['logo_loft']);

        Loft::create($data);

        return back()->with('Sukses','Berhasil menambahkan data!');
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
        $loft = Loft::find($id);
        $data = $request->all();

        if ($request->logo_loft == null) {
            $data['logo_loft'] = $loft->logo_loft;
        } else {
            $this->validate($request, [
                'logo_loft' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $data['logo_loft'] = 'loft-' . time().'.'.$request->logo_loft->getClientOriginalExtension();
            $request->logo_loft->move(public_path('image'), $data['logo_loft']);
        }

        $loft->update($data);

        return back()->with('Sukses','Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Loft::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }
}
