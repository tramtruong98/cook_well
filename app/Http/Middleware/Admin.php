<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if ( Auth::check() && (Auth::user()->roles->first()->role == 'admin') && Auth::user()->is_activated == true)
        {
            return $next($request);
        }
        // if (Auth::user()->is_activated == true)
        // {
        //     return redirect('home');
        // }
    }
}
