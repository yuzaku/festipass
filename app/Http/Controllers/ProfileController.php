<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'tel_num' => ['required', 'string', 'max:15', 'regex:/^[0-9+\-\s]+$/'],
        ]);

        // Clean phone number (remove spaces and special chars except +)
        $cleanPhone = preg_replace('/[^\d+]/', '', $validated['tel_num']);

        try {
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'tel_num' => $cleanPhone,
            ]);

            return redirect()->back()->with('success', 'Profile berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui profile.');
        }
    }

    /**
     * Request organizer account
     */
    public function requestOrganizer(Request $request)
    {
        $user = Auth::user();

        if ($user->is_organizer) {
            return redirect()->back()->with('info', 'Anda sudah memiliki akun organizer.');
        }

        // Di sini bisa ditambahkan logic untuk request organizer
        // Misalnya simpan ke tabel organizer_requests atau kirim email ke admin
        
        return redirect()->back()->with('success', 'Permintaan akun organizer telah dikirim. Tunggu konfirmasi dari admin.');
    }
}
