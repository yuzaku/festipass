<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class OrgProfileHistoryController extends Controller
{
    public function index()
    {
        // Ambil semua event milik organizer yang sedang login, urutkan berdasarkan tanggal
        $events = Events::where('organizer_id', auth()->id())
                        ->orderBy('event_date', 'asc')
                        ->get();

        // Kirim ke view yang benar
        return view('profile.orgprofilehistory', compact('events'));
    }
}
