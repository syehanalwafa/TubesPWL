<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {
                // Jika pengguna dari guard 'karyawan', arahkan ke dashboard karyawan
                if ($guard === 'karyawan') {
                    return redirect()->route('karyawan.dashboard');
                }

                // Jika pengguna dari guard 'mahasiswa', arahkan ke dashboard mahasiswa
                if ($guard === 'mahasiswa') {
                    return redirect()->route('mahasiswa.dashboard');
                }
            }
        }

        return $next($request);
    }
}
