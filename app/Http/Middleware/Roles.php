<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
        // if(Auth::check()){
        //     if(Auth::user()->role_id == 1){ // Admin User
        //         return $next($request);
        //     } else if( Auth::user()->role_id == 2){ // Recruiter
        //         return $next($request);
        //     } else if(Auth::user()->role_id == 3){ // Job seeker
        //         return $next($request);
        //     } else {
        //         return abort(403, 'Unidentified User');
        //     }
        // } else {
        //     return redirect('/loginn')->with('Message', "You are not Logged In");
        // }
    }
}
