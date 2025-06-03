<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function myTickets()
    {
        return view('ticket.mytickets');
    }

    public function ticketList()
    {
        return view('ticket.ticketlist');
    }
}
