<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request; // Import class Request
use Illuminate\Http\RedirectResponse; // Import class RedirectResponse
use App\Models\Events;

class ConcertTicketController extends Controller
{
    /**
     * Menampilkan halaman edit untuk konser tertentu.
     */
    public function edit(Events $concert): View
    {
        // ... (kode ini tetap sama)
        $tickets = $concert->tickets()->orderBy('price', 'desc')->get();
        return view('organizer.concert_ticket_edit', [
            'concert' => $concert,
            'tickets' => $tickets
        ]);
    }

    /**
     * Menampilkan form untuk menambahkan tiket.
     */
    public function showAddTicketForm(Events $concert): View
    {
        // ... (kode ini tetap sama)
        return view('organizer.addnewticket', [
            'concert' => $concert
        ]);
    }

    /**
     * METODE BARU: Validasi dan simpan data tiket baru ke database.
     */
    public function storeTicket(Request $request, Events $concert): RedirectResponse
    {
        // 1. Validasi data yang masuk dari form
        $validatedData = $request->validate([
            'ticket_type' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
        ]);

        // 2. Buat data tiket baru menggunakan relasi
        // Ini secara otomatis akan mengisi event_id
        $concert->tickets()->create([
            'ticket_type' => $validatedData['ticket_type'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'sold' => 0, // Atur nilai 'sold' default ke 0
        ]);

        // 3. Redirect kembali ke halaman edit dengan pesan sukses
        return redirect()->route('managetickets.edit', $concert)
                         ->with('success', 'New ticket type has been added successfully!');
    }
}