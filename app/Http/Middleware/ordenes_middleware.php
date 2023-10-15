<?php

namespace App\Http\Middleware;

use Auth;

use Closure;
use Illuminate\Http\Request;

class ordenes_middleware
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'Administrador') {
            return $next($request);
        }

        if (Auth::user()->role == 'Developer') {
            return $next($request);
        }

        if (Auth::user()->role == 'Vendedor') {
            return $next($request);
        } 
         if (Auth::user()->role == 'Dibujante') {
            return $next($request);
        } 
        else 
        {
            return redirect()->route('dashboard');
        }
    }
}
