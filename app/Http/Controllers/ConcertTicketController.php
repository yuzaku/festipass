<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Events;
use App\Models\Ticket; // <-- PERUBAHAN UTAMA ADA DI SINI

class ConcertTicketController extends Controller
{
    /**
     * Menampilkan halaman edit untuk konser tertentu.
     */
    public function edit(Events $concert): View
    {
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
        return view('organizer.addnewticket', [
            'concert' => $concert
        ]);
    }

    /**
     * Validasi dan simpan data tiket baru ke database.
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

    /**
     * Menampilkan form untuk mengedit tiket yang sudah ada.
     */
    public function editTicket(Events $concert, Ticket $ticket): View
    {
        // Laravel akan otomatis mencari data Concert dan Ticket berdasarkan ID dari URL
        return view('organizer.edit_ticket', [
            'concert' => $concert,
            'ticket' => $ticket,
        ]);
    }

    /**
     * Memvalidasi dan menyimpan perubahan pada tiket.
     */
    public function updateTicket(Request $request, Events $concert, Ticket $ticket): RedirectResponse
    {
        // 1. Validasi data
        $validatedData = $request->validate([
            'ticket_type' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            // Logika validasi khusus: stok tidak boleh lebih rendah dari yang sudah terjual
            'stock' => 'required|integer|min:' . $ticket->sold,
        ]);

        // 2. Update data tiket di database
        $ticket->update($validatedData);

        // 3. Redirect kembali ke halaman edit konser dengan pesan sukses
        return redirect()->route('managetickets.edit', $concert)
                         ->with('success', 'Ticket details updated successfully!');
    }

        public function destroyTicket(Events $concert, Ticket $ticket): RedirectResponse
    {
        // Logika untuk memastikan tidak bisa menghapus jika sudah ada yang terjual (opsional, tapi disarankan)
        if ($ticket->sold > 0) {
            return redirect()->route('managetickets.ticket.edit', ['concert' => $concert, 'ticket' => $ticket])
                             ->with('error', 'Cannot delete ticket type that has already been sold.');
        }

        // Hapus tiket
        $ticket->delete();

        // Redirect kembali ke halaman edit konser dengan pesan sukses
        return redirect()->route('managetickets.edit', $concert)
                         ->with('success', 'Ticket type has been deleted successfully.');
    }
}