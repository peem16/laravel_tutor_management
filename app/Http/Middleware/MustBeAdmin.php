<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MustBeAdmin

{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $guard = null)
     {


       if (Auth::guard($guard)->check()) {


           $user = $request->user();
           if($user && $user->idemp != ''){
             return $next($request);

           }else{

           $acc =   $user->access;
           return redirect("/");

           }
       }
       // if (Auth::guard($guard)->check()) {


           // if(session::get('username') && session::get('idemp') != '0'){
           //
           //
           //
           //   return $next($request);
           //
           // }else if(session::get('username') && session::get('idstudent') != '0'){
           //
           //
           // return redirect("studen");
           //
           // }else if(session::get('username') && session::get('idtutor') != '0'){
           //
           //
           // return redirect("tutor");
           //
           // }


       // }

 return redirect("/");


     }
}
