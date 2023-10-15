<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class produccion_middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'Administrador') {
            return $next($request);
        }

            if (Auth::user()->role == 'Supervisor producción') {
                return $next($request);
            } else {
                return redirect()->route('dashboard');
            }
        
    }
}
