<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View; // Import class View
// Nanti Anda mungkin perlu:
// use App\Models\User;
// use Illuminate\Support\Facades\DB; // Jika menggunakan query builder untuk token/verifikasi
// use Illuminate\Support\Str; // Untuk generate token
// use Illuminate\Support\Facades\Mail; // Untuk kirim email (jika alurnya pakai email)
// use App\Mail\PasswordResetMail; // Contoh Mailable

class ForgotPasswordController extends Controller
{
    /**
     * Menampilkan form untuk meminta link reset password (Step 1 - Email).
     */
    public function showLinkRequestForm(): View
    {
        return view('auth.forgotpassword-1');
    }

    /**
     * Menangani permintaan pengiriman link reset password (Proses dari Step 1).
     * Untuk saat ini, kita akan langsung redirect ke step 2 dengan membawa email.
     * Di aplikasi nyata, di sini Anda akan:
     * 1. Validasi email.
     * 2. Cek apakah email ada di database.
     * 3. Jika ada, (opsional) generate token unik atau siapkan data untuk verifikasi.
     * 4. Kirim email ke pengguna dengan link/instruksi atau siapkan sesi/flash data.
     * 5. Redirect ke halaman step 2 atau halaman konfirmasi.
     */
    public function handleLinkRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
        ]);

        $email = $request->input('email');

        // Logika placeholder: Langsung redirect ke form verifikasi kode
        // Di aplikasi nyata, Anda mungkin ingin menyimpan email ini di sesi
        // atau menggunakan token yang dikirim via email yang mengarah ke step 2.
        // Untuk kesederhanaan, kita teruskan email sebagai query parameter.
        return redirect()->route('password.show.verification.form', ['email' => $email])
                         ->with('status', 'Silakan masukkan kode verifikasi.'); // Pesan opsional
    }

    /**
     * Menampilkan form untuk memasukkan kode verifikasi (Step 2 - Kode Telepon).
     */
    public function showVerificationForm(Request $request): View
    {
        // Ambil email dari query parameter (atau sesi jika Anda menggunakannya)
        $email = $request->query('email');

        if (!$email) {
            // Jika tidak ada email, redirect kembali ke step 1
            return redirect()->route('password.request')->withErrors(['email' => 'Sesi tidak valid atau email tidak ditemukan.']);
        }

        return view('auth.forgotpassword-2', ['email' => $email]);
    }

    /**
     * Menangani verifikasi kode (Proses dari Step 2).
     * Untuk saat ini, ini hanya placeholder.
     * Di aplikasi nyata, di sini Anda akan:
     * 1. Validasi input (email dan kode).
     * 2. Ambil pengguna berdasarkan email.
     * 3. Ambil 4 digit terakhir nomor telepon pengguna dari database.
     * 4. Bandingkan kode yang dimasukkan dengan 4 digit terakhir nomor telepon.
     * 5. Jika valid, redirect ke halaman untuk memasukkan password baru.
     * 6. Jika tidak valid, kembali ke form step 2 dengan pesan error.
     */
    public function handleVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string', // Email bisa diambil dari hidden input atau sesi
            'verification_code' => 'required|string|min:4|max:4', // Validasi dasar kode
        ]);

        $email = $request->input('email');
        $verificationCode = $request->input('verification_code');

        // --- Logika Placeholder untuk Verifikasi Kode ---
        // Contoh: Ambil user berdasarkan email
        // $user = User::where('email', $email)->first();
        // if (!$user || !$user->telephone_number) {
        //     return back()->withErrors(['verification_code' => 'User atau nomor telepon tidak ditemukan.'])->withInput();
        // }
        // $lastFourDigitsOfPhone = substr($user->telephone_number, -4);
        // if ($verificationCode === $lastFourDigitsOfPhone) {
        //     // Kode valid, siapkan untuk reset password
        //     // Anda mungkin ingin menyimpan status ini di sesi dan membuat token reset
        //     session(['password_reset_email' => $email, 'password_reset_verified' => true]);
        //     return redirect()->route('password.reset.form'); // Route ke form input password baru
        // } else {
        //     return back()->withErrors(['verification_code' => 'Kode verifikasi tidak valid.'])->withInput();
        // }
        // --- Akhir Logika Placeholder ---

        // Untuk saat ini, kita anggap berhasil dan tampilkan pesan
        return redirect()->route('login')->with('status', "Verifikasi kode untuk $email berhasil (placeholder). Anda akan diarahkan ke form reset password.");
        // Idealnya redirect ke form input password baru.
    }

    /**
     * (Opsional - Langkah Berikutnya) Menampilkan form untuk memasukkan password baru.
     */
    // public function showResetForm(Request $request): View
    // {
    //     if (!session('password_reset_verified') || !session('password_reset_email')) {
    //         return redirect()->route('password.request')->withErrors(['email' => 'Verifikasi tidak valid.']);
    //     }
    //     $email = session('password_reset_email');
    //     return view('auth.reset-password', ['email' => $email]); // Anda perlu membuat view ini
    // }

    /**
     * (Opsional - Langkah Berikutnya) Menangani penyimpanan password baru.
     */
    // public function updatePassword(Request $request)
    // {
    //     if (!session('password_reset_verified') || !session('password_reset_email')) {
    //         return redirect()->route('password.request')->withErrors(['email' => 'Verifikasi tidak valid atau sesi telah berakhir.']);
    //     }
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string|min:8|confirmed',
    //         // 'token' => 'required|string', // Jika menggunakan token
    //     ]);
    //     // Logika untuk update password user
    //     // ...
    //     session()->forget(['password_reset_email', 'password_reset_verified']);
    //     return redirect()->route('login')->with('status', 'Password Anda telah berhasil direset.');
    // }
}