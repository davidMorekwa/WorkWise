<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // return dd($next($request));
        if(Auth::check()){
            if(Auth::user()->role_id == $role){
                return $next($request);
            } else {
                abort('403');
            }
        } else {
            return redirect('/login')->with('Message', "You are not Logged In");
        }
    }
}
