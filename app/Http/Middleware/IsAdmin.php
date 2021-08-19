<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()){
            if(auth()->user()->is_admin == 1){

                return $next($request);
            }
            return back()->with('event_permission',"you do not have the permission");
            
        }
       
        return redirect('/error-400-notfound');
    }
}
