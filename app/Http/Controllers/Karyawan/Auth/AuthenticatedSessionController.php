<?php

namespace App\Http\Controllers\Karyawan\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\KaryawanLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('karyawan.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(KaryawanLoginRequest $request): RedirectResponse
    {
        if (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

        if (!$user) {
            return back()->withErrors(['login' => 'Akun tidak ditemukan atau belum terautentikasi.']);
        }

        return redirect()->intended($user->role == 'karyawan' ? route('karyawan.dashboard') : route('mahasiswa.dashboard'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('karyawan')->logout();

        $request->session()->regenerateToken();

        return redirect()->route('karyawan.login');
    }
}

