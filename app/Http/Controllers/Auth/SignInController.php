<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Http\RedirectResponse; // Untuk type hinting RedirectResponse
use Illuminate\View\View;

class SignInController extends Controller
{
    /**
     * Menampilkan halaman sign-in.
     */
    public function create(): View
    {
        return view('auth.sign-in');
    }

    /**
     * Menangani percobaan login.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba autentikasi pengguna
        if (Auth::attempt($credentials, $request->boolean('remember'))) { // $request->boolean('remember') untuk fitur "Remember Me"
            // 3. Jika berhasil, regenerate session
            $request->session()->regenerate();

            // 4. Redirect ke halaman yang diinginkan (misalnya dashboard)
            // return redirect()->intended('dashboard'); // Ganti 'dashboard' dengan route tujuan Anda
            return redirect()->intended('/dashboard')->with('status', 'Anda berhasil login!'); // Contoh dengan route dan pesan
        }

        // 5. Jika gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email'); // Hanya kirim kembali input email, bukan password
    }

    /**
     * Menangani proses logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Anda telah logout.');
    }
}