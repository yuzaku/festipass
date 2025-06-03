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
     * Show organizer request form
     */
    public function showOrganizerRequest()
    {
        $user = Auth::user();
        
        // Check if user is already an organizer
        if ($user->is_organizer) {
            return redirect()->route('profile.show')->with('info', 'Anda sudah memiliki akun organizer.');
        }

        return view('profile.request-organizer', compact('user'));
    }

    /**
     * Store organizer request
     */
    public function storeOrganizerRequest(Request $request)
    {
        $user = Auth::user();

        // Check if user is already an organizer
        if ($user->is_organizer) {
            return redirect()->route('profile.show')->with('info', 'Anda sudah memiliki akun organizer.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_email' => ['required', 'email', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'terms' => ['required', 'accepted'],
        ]);

        try {
            // You can create OrganizerRequest model and save the data
            // OrganizerRequest::create([
            //     'user_id' => $user->id,
            //     'name' => $validated['name'],
            //     'company_name' => $validated['company_name'],
            //     'company_email' => $validated['company_email'],
            //     'description' => $validated['description'],
            //     'status' => 'pending'
            // ]);

            return redirect()->back()->with('success', 'Permintaan akun organizer telah dikirim. Tunggu konfirmasi dari admin dalam 1-2 minggu dan cek email Anda!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim permintaan.');
        }
    }
}
