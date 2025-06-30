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
use Illuminate\Support\Facades\Auth;

class TicketOrderController extends Controller
{
    public function order(Request $request, $ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);

        // Validasi input
        $validated = $request->validate([
            'ticket_count' => 'required|integer|min:1|max:3', // BATAS DI SINI
        ]);

        // Cek apakah stok cukup
        if ($ticket->stock - $ticket->sold < $validated['ticket_count']) {
            return back()->withErrors(['ticket_count' => 'Stok tiket tidak mencukupi.']);
        }

        // Simpan order
         $order = Orders::create([
        'user_id' => Auth::id(), // sesuaikan kalau belum pakai auth
        'order_date' => Carbon::now(),
        'status' => 'pending', // atau 'belum dibayar'
        ]);

        OrderItems::create([
        'order_id' => $order->id,
        'ticket_id' => $ticket->id,
        'quantity' => $validated['ticket_count'],
        'total_price' => $ticket->price * $validated['ticket_count'],
        ]);

        $ticket->sold += $validated['ticket_count'];
        $ticket->save();

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

    public function selectPayment(Orders $order)
    {
    return view('book-ticket.select-payment', compact('order'));
    }

    public function savePayment(Request $request, Orders $order)
    {
        $validated = $request->validate([
            'payment_method' => 'required|string|max:30',
        ]);

        $order->payment_method = $validated['payment_method'];
        $order->save();

        return redirect()->route('order.details', ['orderId' => $order->id])
           ->with('success', 'Metode pembayaran diperbarui!');
    }

    public function pay(Request $request, Orders $order)
    {
        // Jika perlu, tambahkan pengecekan apakah order masih “pending”
        $order->status = 'paid';
        $order->save();

        // response JSON supaya bisa dipanggil AJAX
        return response()->json(['success' => true]);
    }
}
