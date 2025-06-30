<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Events;

class OrgProfileReviewsController extends Controller
{
    /**
     * Halaman indeks untuk reviews. Mencari event pertama dan redirect.
     */
    public function index(): RedirectResponse
    {
        $firstEvent = Events::latest()->first();

        if (!$firstEvent) {
            // Jika tidak ada event, kembali ke dashboard dengan pesan
            return redirect()->route('organizer.dashboard')->with('info', 'No events found to show reviews for.');
        }

        // Redirect ke rute 'reviews.show' dengan membawa ID event pertama
        return redirect()->route('organizer.profile.reviews.show', $firstEvent);
    }

    /**
     * Menampilkan ulasan untuk event yang spesifik.
     */
    public function show(Events $event): View
    {
        // Ambil SEMUA event untuk ditampilkan di daftar sebelah kiri
        $events = Events::with('tickets')->latest()->get();

        // Event yang dipilih ($selectedEvent) adalah event yang diterima dari URL
        $selectedEvent = $event;
        
        // Ambil ulasan yang berhubungan dengan event yang dipilih
        $reviews = $selectedEvent->reviews()->with('user')->latest()->get();

        // Kirim semua data ke view
        return view('profile.reviews', compact('events', 'selectedEvent', 'reviews'));
    }
}