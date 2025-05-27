<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'language' => 'required|string',
            'account_type' => 'required|in:Regular User,Organizer',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'language' => $request->language,
            'account_type' => $request->account_type,
        ]);

        return redirect()->route('profile.edit')->with('status', 'Profile updated!');
    }
}
