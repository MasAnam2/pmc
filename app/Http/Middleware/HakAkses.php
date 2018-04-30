<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class HakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $hak_akses, $hak_akses2)
    {
        if(Auth::user()->hak_akses != $hak_akses && Auth::user()->hak_akses != $hak_akses2){
            abort(404);
        }
        return $next($request);
    }
}
