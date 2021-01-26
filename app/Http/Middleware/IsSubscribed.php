<?php

namespace App\Http\Middleware;

use Closure;

class IsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!isset(auth()->user()->type_user)) {
            // return back()->with('Gagal',"Anda belum terdaftar sebagai user berbayar.");
            session(['pageName' => $request->path()]);
            return redirect('login')->with('Gagal',"Sesi berakhir, harap login kembali.");
        }
        
        if(auth()->user()->type_user == 2 && auth()->user()->is_active == 1){
            return $next($request);
        }
   
        return back()->with('Gagal',"Anda belum terdaftar sebagai user berbayar.");
    }
}
