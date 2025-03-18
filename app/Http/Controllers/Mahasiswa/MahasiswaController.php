<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Mahasiswa; // Import model Mahasiswa

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        // Pastikan guard yang digunakan adalah 'mahasiswa'
        $guard = session('auth_guard', 'mahasiswa');
        Log::channel("my_logs")->info("auth guard : " . $guard);

        if ($guard !== 'mahasiswa') {
            return back()->withErrors([
                'role' => 'User is not a mahasiswa!',
            ]);
        }

        // Pastikan user sudah login
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('home');
        }

        // Ambil data mahasiswa yang sedang login
        $user = Auth::guard($guard)->user();

        // Pastikan user adalah instance dari model Mahasiswa
        if (!$user instanceof Mahasiswa) {
            return back()->withErrors(['message' => 'User is not a valid mahasiswa']);
        }

        // Kirim data user ke view dashboard mahasiswa
        return view('mahasiswa.dashboard', ['user' => $user]);
    }
}
