<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\EventReview;
use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
        public function myTickets()
    {
        // Ambil semua order_item user yg status order‑nya = paid
        // dan tanggal event >= hari ini
        $upcoming = OrderItems::whereHas('orders', function ($q) {
                            $q->where('user_id', Auth::id())
                              ->where('status', 'paid');
                        })
                        ->whereHas('ticket.event', function ($q) {
                            $q->whereDate('event_date', '>=', Carbon::today());
                        })
                        ->with(['ticket.event'])
                        ->get()
                        ->sortBy(fn ($item) => $item->ticket->event->event_date)
                        ->groupBy('ticket.event_id');   // → 1 kartu per event

        return view('ticket.mytickets', compact('upcoming'));
    }

    public function history()
    {
        $past = OrderItems::whereHas('orders', fn ($q) =>
                    $q->where('user_id', auth()->id())
                      ->where('status', 'paid')
                )
                ->whereHas('ticket.event', fn ($q) =>
                    $q->whereDate('event_date', '<', Carbon::today())
                )
                ->with(['ticket.event'])
                ->get()
                ->groupBy('ticket.event_id');   // satu kartu per event

        return view('ticket.ticketlist', compact('past'));
    }
    public function detail(Orders $order)
    {
    // pastikan order milik user
        abort_if($order->user_id !== auth()->id(), 403);

    // eager‑load relasi
        $order->load(['order_items.ticket.event']);

    // hanya butuh satu event (diasumsikan order 1 event)
        $event = $order->order_items->first()->ticket->event;

    // total & seat example (ubah sesuai tabel seat jika ada)
        $totalQty   = $order->order_items->sum('quantity');
        $totalPrice = $order->order_items->sum('total_price');

        return view('ticket.ticketdetail', compact(
            'order', 'event', 'totalQty', 'totalPrice'
        ));
    }

    public function store(Request $request, Events $event)
    {
        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        EventReview::updateOrCreate(
            ['user_id' => auth()->id(), 'event_id' => $event->id],
            $data + ['user_id' => auth()->id()]
        );

        return response()->json(['success' => true]);
    }
}
