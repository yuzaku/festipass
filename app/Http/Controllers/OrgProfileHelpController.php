<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrgProfileHelpController extends Controller
{
    /**
     * Show the Help Center page.
     */
    public function index()
    {
        return view('profile.orgprofilehelpcenter');
    }

    /**
     * Handle the help form submission.
     */
    public function sendQuestion(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'question' => 'required|string|max:2000',
        ]);

        // Proses pengiriman email atau penyimpanan data (opsional)
        // Contoh sederhana (kirim email ke admin)
        Mail::raw(
            "Email: {$request->email}\n\nQuestion:\n{$request->question}",
            function ($message) use ($request) {
                $message->to('admin@festipass.com')
                        ->subject('New Help Center Question');
            }
        );

        // Kembali ke halaman Help Center dengan pesan sukses
        return redirect()->route('orgprofilehelp.index')->with('success', 'Your question has been sent successfully!');
    }
}
