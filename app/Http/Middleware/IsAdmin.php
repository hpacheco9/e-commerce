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
        // Check if the user is authenticated and has isAdmin = 1
        if (Auth::check() && Auth::user()->isAdmin == 1) {
            return $next($request);  // Allow access to the route
        }

        // If not an admin, redirect or return a 403 response
        return redirect('/login');
    }
}
