<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;

class SignInController extends Controller
{
    /**
     * Display the login form.
     */
    public function create(): View
    {
        // Redirect jika sudah login
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }
        
        return view('auth.sign-in');
    }

    /**
     * Handle the login attempt.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation input
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:1'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Rate limiting untuk mencegah brute force
        $this->checkTooManyFailedAttempts($request);

        // Custom authentication karena menggunakan password_hash
        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Login berhasil
            Auth::login($user, $request->boolean('remember'));
            
            // Regenerate session untuk keamanan
            $request->session()->regenerate();
            
            // Clear failed attempts
            $this->clearFailedAttempts($request);
            
            // Redirect berdasarkan role
            return $this->redirectBasedOnRole($user);
        }

        // Login gagal - track failed attempts
        $this->incrementFailedAttempts($request);

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Handle logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $userName = Auth::user()->name ?? 'User';
        
        Auth::logout();
        
        // Invalidate session dan regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('status', "Sampai jumpa lagi, {$userName}!");
    }

    /**
     * Redirect user based on their role.
     */
    private function redirectBasedOnRole(User $user): RedirectResponse
    {
        if ($user->isOrganizer()) {
            return redirect()->intended('/organizer/dashboard')
                ->with('status', "Selamat datang kembali, {$user->name}! (Organizer)");
        }
        
        return redirect()->intended('/dashboard')
            ->with('status', "Selamat datang kembali, {$user->name}!");
    }

    /**
     * Check for too many failed attempts.
     */
    private function checkTooManyFailedAttempts(Request $request): void
    {
        $key = $this->getFailedAttemptsKey($request);
        $attempts = session($key, 0);
        
        if ($attempts >= 5) {
            $lockoutTime = session($key . '_lockout', 0);
            if (time() < $lockoutTime) {
                $remainingTime = ceil(($lockoutTime - time()) / 60);
                abort(429, "Terlalu banyak percobaan login. Coba lagi dalam {$remainingTime} menit.");
            } else {
                // Reset attempts setelah lockout period
                session()->forget([$key, $key . '_lockout']);
            }
        }
    }

    /**
     * Increment failed login attempts.
     */
    private function incrementFailedAttempts(Request $request): void
    {
        $key = $this->getFailedAttemptsKey($request);
        $attempts = session($key, 0) + 1;
        session([$key => $attempts]);
        
        if ($attempts >= 5) {
            // Lockout selama 15 menit
            session([$key . '_lockout' => time() + (15 * 60)]);
        }
    }

    /**
     * Clear failed login attempts.
     */
    private function clearFailedAttempts(Request $request): void
    {
        $key = $this->getFailedAttemptsKey($request);
        session()->forget([$key, $key . '_lockout']);
    }

    /**
     * Get the failed attempts session key.
     */
    private function getFailedAttemptsKey(Request $request): string
    {
        return 'failed_attempts_' . sha1($request->ip() . '|' . $request->userAgent());
    }
}
