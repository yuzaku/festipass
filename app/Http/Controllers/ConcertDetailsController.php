<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function show($id)
    {
        // Contoh data dummy (bisa kamu ganti dengan data dari database)
        $ticket = [
            'id' => $id,
            'order_id' => 'ORD123456',
            'concert_name' => 'SISFORIA : TGIF!',
            'venue' => 'Lagoon Avenue Mall',
            'date' => '05 January 2025',
            'time' => '19:00',
            'ticket_quantity' => 3,
            'status' => 'Purchase Successful',
        ];

        return view('ticket.concert-details', compact('ticket'));
    }
}
