<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AddtickettypeController extends Controller
{
    /**
     * Menampilkan form untuk menambahkan jenis tiket baru (View 2).
     */
    public function showPage(): View
    {
        // PERUBAHAN: dari 'addnewticket' menjadi 'organizer.addnewticket'
        return view('organizer.addnewticket');
    }

    /**
     * Metode edit lama bisa Anda simpan untuk penggunaan di masa depan dengan parameter,
     * atau hapus jika Anda yakin tidak akan menggunakannya.
     *
     * public function edit($concertId): View
     * {
     * // Jika Anda ingin menggunakan view yang sama:
     * // return view('concert_ticket_edit');
     * // Atau jika view ini spesifik untuk data tertentu:
     * // $concert = Concert::findOrFail($concertId);
     * // return view('concert_ticket_edit', compact('concert'));
     * }
     */

    // Metode 'update' bisa ditambahkan nanti
    // public function update(Request $request, $concertId)
    // {
    //     // ...
    // }
}