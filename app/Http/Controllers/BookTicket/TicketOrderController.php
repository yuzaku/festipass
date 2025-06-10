<?php

namespace App\Http\Controllers\BookTicket;

use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Events;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TicketOrderController extends Controller
{
    public function order(Request $request, $ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);

        // Validasi input
        $validated = $request->validate([
            'ticket_count' => 'required|integer|min:1|max:3', // BATAS DI SINI
        ]);

        // Simpan order
         $order = Orders::create([
        'user_id' => 1, // sesuaikan kalau belum pakai auth
        'order_date' => Carbon::now(),
        'status' => 'pending', // atau 'belum dibayar'
        ]);

        OrderItems::create([
        'order_id' => $order->id,
        'ticket_id' => $ticket->id,
        'quantity' => $validated['ticket_count'],
        'price' => $ticket->price,
        ]);
        return redirect()->route('order.details', ['orderId' => $order->id])->with('success', 'Tiket berhasil dipesan!');
    }

        public function order_details($orderId)
    {
        $order = Orders::findOrFail($orderId);
        $order_items = $order->order_items()->with('ticket.event')->get();
        $event = $order_items->first()->ticket->event ?? null;
        $event->formatted_date = Carbon::parse($event->event_date)->locale('id') // pastikan ini diset agar bulan & hari dalam Bahasa Indonesia
        ->translatedFormat('l, d F Y');
        return view('/book-ticket/order-details', compact('order','order_items','event'));
    }
}
