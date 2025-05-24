<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View; // Import class View

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman registrasi.
     */
    public function create(): View // Tambahkan return type hint
    {
        return view('auth.register'); // Mengarahkan ke 'resources/views/auth/register.blade.php'
    }

    /**
     * Menangani proses registrasi pengguna baru.
     * (Kita akan implementasikan ini nanti)
     */
    // public function store(Request $request)
    // {
    //     // Logika untuk validasi dan menyimpan pengguna baru
    //     // Contoh:
    //     // $validatedData = $request->validate([
    //     //     'username' => 'required|string|max:255|unique:users',
    //     //     'email' => 'required|string|email|max:255|unique:users',
    //     //     'password' => 'required|string|min:8|confirmed',
    //     //     'telephone' => 'required|string|max:15',
    //     // ]);

    //     // // Buat user baru
    //     // $user = User::create([
    //     //     'username' => $validatedData['username'],
    //     //     'email' => $validatedData['email'],
    //     //     'password' => Hash::make($validatedData['password']),
    //     //     'telephone_number' => $validatedData['telephone'],
    //     // ]);

    //     // // Login user setelah registrasi (opsional)
    //     // Auth::login($user);

    //     // // Redirect ke halaman yang sesuai
    //     // return redirect('/dashboard'); // atau halaman lain

    //     return redirect()->back()->with('success', 'Registrasi berhasil! Silakan login.'); // Contoh sederhana
    // }
}