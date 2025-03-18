<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            // Redirect based on the guard
            if ($guard === 'mahasiswa') {
                return redirect('/mahasiswa/login'); 
            } elseif ($guard === 'karyawan') {
                return redirect('/karyawan/login'); 
            }
        }

        return $next($request);
    }
}