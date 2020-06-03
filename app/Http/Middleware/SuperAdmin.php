<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
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
        if(Auth::user()){
            if(Auth::user()->role == 'Super Admin'){
                return $next($request);
            }else{
                return redirect()->back('/admin');
            }
        }
        else{
            return redirect()->route('admin.login');
        }
    }
}
