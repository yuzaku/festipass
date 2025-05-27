<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Display the registration form.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle the registration.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tel_num' => ['required', 'string', 'max:15', 'regex:/^[0-9+\-\s]+$/'],
            'is_organizer' => ['boolean'],
        ]);

        // Clean phone number (remove spaces and special chars except +)
        $cleanPhone = preg_replace('/[^\d+]/', '', $validated['tel_num']);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password_hash' => Hash::make($validated['password']),
            'tel_num' => $cleanPhone,
            'is_organizer' => $request->has('is_organizer') ? 1 : 0,
        ]);

        // Auto login after registration
        Auth::login($user);

        return redirect('/dashboard')->with('status', 'Akun berhasil dibuat!');
    }
}
