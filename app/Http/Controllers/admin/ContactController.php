<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CMSContact;

class ContactController extends Controller
{
    public function index(){
        $contact = CMSContact::all();
        return view('admin.pages.list-contact', [
        'contact' => $contact, 
        ]);
    }

    public function create(Request $request)
    {
        // dd($request);
        CMSContact::create($request->all());

        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    public function edit(Request $request)
    {
        // dd($request->all());
        $contact = CMSContact::find($request->id);
        $contact->update($request->all());

        return back()->with('Sukses','Berhasil mengubah data!');
    }

    public function destroy($id)
    {
        CMSContact::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }
}
