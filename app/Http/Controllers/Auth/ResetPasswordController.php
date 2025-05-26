<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        if (!Session::has('verified_reset_email')) {
            return redirect()->route('password.request')->withErrors('Silakan verifikasi email terlebih dahulu.');
        }

        $email = Session::get('verified_reset_email');
        return view('auth.reset-password', compact('email'));
    }

    public function handleReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (!Session::has('verified_reset_email') || Session::get('verified_reset_email') !== $request->email) {
            return redirect()->route('password.request')->withErrors('Unauthorized access.');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('password.request')->withErrors('User tidak ditemukan.');
        }

        $user->password_hash = Hash::make($request->password);
        $user->save();

        Session::forget(['reset_email', 'verified_reset_email']);

        return redirect()->route('login')->with('status', 'Password berhasil direset! Silakan login.');
    }
}
