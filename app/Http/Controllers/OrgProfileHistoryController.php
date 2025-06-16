<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class OrgProfileHistoryController extends Controller
{
    public function index()
    {
        // Ambil semua event yang diurutkan berdasarkan tanggal secara ascending
        $events = Event::orderBy('date', 'asc')->get();

        // Kirim data ke view orgprofilehistory.blade.php
        return view('profile.orgprofilehistory', compact('events'));
    }
}
