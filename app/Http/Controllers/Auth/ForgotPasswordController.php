<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    /**
     * Display the forgot password form.
     */
    public function showLinkRequestForm(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle the email verification request.
     */
    public function handleLinkRequest(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email tidak ditemukan dalam sistem kami.'
            ], 404);
        }

        if (!$user->tel_num) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor telepon tidak terdaftar untuk akun ini.'
            ], 400);
        }

        // Ambil 4 digit terakhir nomor telepon sebagai kode verifikasi STATIC
        $phoneNumber = preg_replace('/[^0-9]/', '', $user->tel_num);
        $last4Digits = substr($phoneNumber, -4);
        
        // Buat hint untuk ditampilkan (sembunyikan sebagian nomor)
        $phoneHint = str_repeat('*', max(0, strlen($phoneNumber) - 4)) . $last4Digits;

        // Simpan email dan kode verifikasi di session
        Session::put('reset_email', $request->email);
        Session::put('verification_code', $last4Digits); // Kode STATIC dari nomor telepon
        Session::put('verification_expires', now()->addMinutes(15));

        return response()->json([
            'success' => true,
            'message' => 'Silakan masukkan 4 digit terakhir nomor telepon Anda.',
            'phone_hint' => $phoneHint
        ]);
    }

    /**
     * Handle the verification code.
     */
    public function handleVerificationCode(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'verification_code' => ['required', 'string', 'size:4'],
        ]);

        // Cek session
        if (!Session::has('reset_email') || !Session::has('verification_code')) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired. Please start over.'
            ], 400);
        }

        // Cek apakah session sudah expired
        if (Session::get('verification_expires') < now()) {
            Session::forget(['reset_email', 'verification_code', 'verification_expires']);
            return response()->json([
                'success' => false,
                'message' => 'Verification session expired. Please request a new one.'
            ], 400);
        }

        // Cek email dan kode verifikasi
        $sessionEmail = Session::get('reset_email');
        $sessionCode = Session::get('verification_code');

        if ($request->email !== $sessionEmail) {
            return response()->json([
                'success' => false,
                'message' => 'Email mismatch.'
            ], 400);
        }

        if ($request->verification_code !== $sessionCode) {
            return response()->json([
                'success' => false,
                'message' => 'Kode verifikasi salah. Masukkan 4 digit terakhir nomor telepon Anda.'
            ], 400);
        }

        // Verifikasi berhasil
        Session::put('verified_reset_email', $request->email);
        Session::forget(['verification_code', 'verification_expires']);

        return response()->json([
            'success' => true,
            'message' => 'Verification successful.',
            'redirect_url' => route('password.reset')
        ]);
    }

    /**
     * Display the reset password form.
     */
    public function showResetForm(): View
    {
        if (!Session::has('verified_reset_email')) {
            return redirect()->route('password.request')
                ->with('error', 'Unauthorized access. Please verify your email first.');
        }

        $email = Session::get('verified_reset_email');
        return view('auth.reset-password', compact('email'));
    }

    /**
     * Handle the password reset.
     */
    public function handleReset(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!Session::has('verified_reset_email') || Session::get('verified_reset_email') !== $request->email) {
            return redirect()->route('password.request')
                ->with('error', 'Unauthorized access.');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('password.request')
                ->with('error', 'User not found.');
        }

        $user->update([
            'password_hash' => Hash::make($request->password)
        ]);

        // Clear all reset sessions
        Session::forget(['reset_email', 'verified_reset_email']);

        return redirect()->route('login')
            ->with('status', 'Password berhasil direset! Silakan login dengan password baru Anda.');
    }

    /**
     * Resend verification code (tidak perlu kirim apapun, hanya refresh session).
     */
    public function resendCode(Request $request): JsonResponse
    {
        if (!Session::has('reset_email')) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired. Please start over.'
            ], 400);
        }

        $email = Session::get('reset_email');
        $user = User::where('email', $email)->first();

        if (!$user || !$user->tel_num) {
            return response()->json([
                'success' => false,
                'message' => 'Unable to resend code.'
            ], 400);
        }

        // Kode tetap sama (4 digit terakhir nomor telepon)
        $phoneNumber = preg_replace('/[^0-9]/', '', $user->tel_num);
        $last4Digits = substr($phoneNumber, -4);

        // Update session dengan extend expiry
        Session::put('verification_code', $last4Digits);
        Session::put('verification_expires', now()->addMinutes(15));

        return response()->json([
            'success' => true,
            'message' => 'Kode verifikasi tetap sama: 4 digit terakhir nomor telepon Anda.'
        ]);
    }
}
