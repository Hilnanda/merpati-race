<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class ListUserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.pages.list-user', [
        'user' => $user, 
        ]);
    }
    public function create(Request $request)
    {
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'name_loft' => $request->name .' Loft',
            'password' => Hash::make($request->password),
            'type_user' => 2,
            'is_active' => 1
        ]);

        return back()->with('Sukses','Berhasil menambahkan data!');
    }

    public function edit(Request $request)
    {
        // dd($request->all());

        $user = User::find($request->id);
        // $user->update($request->all());
        if($user->password==$request->password){
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                // 'password' => Hash::make($request->password),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        

        return back()->with('Sukses','Berhasil mengubah data!');
    }
    public function destroy($id)
    {
        User::find($id)->delete();

        return back()->with('Sukses','Berhasil menghapus data!');
    }
}
