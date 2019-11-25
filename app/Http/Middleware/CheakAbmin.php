<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheakAbmin
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
        if(Auth::user()->status == 'admin'){
            return $next($request);
        }else{
            abort(403,"คุณไม่มีสิทธิ์เข้าหน้านี้");
        }
        
    }
}
