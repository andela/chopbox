<?php

namespace ChopBox\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HomeMiddleware
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
        if (!Auth::check()) {
            return view('pages.welcome');
        }
        
        if (!Auth::user()->profile_state) {
            return view('pages.initial_profile_update');
        }
        
        return $next($request);
    }
}
