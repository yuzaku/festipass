<?php

namespace App\Http\Controllers\BookTicket;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketSelectionController extends Controller
{
    /**
     * Menampilkan view select-ticket berdasarkan event.
     *
     * @param int $eventId
     * @return \Illuminate\View\View
     */
    public function show($eventId)
    {
        $event = Events::with('tickets')->findOrFail($eventId);
        return view('/book-ticket/select-ticket', compact('event'));
    }
    public function book($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $event = $ticket->event;

        return view('/book-ticket/book-ticket', compact('ticket', 'event'));
    }
}
