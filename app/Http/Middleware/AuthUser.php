<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== 'user'  ) {
            if( Auth::check() && Auth::user()->role=='admin'){
              return redirect()->route('dashboard');
            }
            session(['url.intended' => url()->current()]);
            return redirect()->route('user.login');
        }

        return $next($request);
    }
}
