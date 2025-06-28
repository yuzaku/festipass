<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class SalesReportController extends Controller
{
    public function index()
    {
        $events = Events::with('tickets')->get();

        $totalSales = 0;
        $totalTickets = 0;
        $totalEvents = $events->count();

        $eventData = [];

        foreach ($events as $event) {
            $ticketsSold = $event->tickets->sum('sold');
            $revenue = $event->tickets->sum(function ($ticket) {
                return $ticket->sold * $ticket->price;
            });

            $totalSales += $revenue;
            $totalTickets += $ticketsSold;

            $eventData[] = [
                'title' => $event->title,
                'date' => \Carbon\Carbon::parse($event->event_date)->format('d M Y'),
                'location' => $event->location,
                'tickets_sold' => $ticketsSold,
                'revenue' => 'Rp. ' . number_format($revenue, 0, ',', '.'),
            ];
        }

        return view('organizer.salesreport', [
            'totalSales' => 'Rp. ' . number_format($totalSales, 0, ',', '.'),
            'totalTickets' => $totalTickets,
            'totalEvents' => $totalEvents,
            'eventData' => $eventData,
        ]);
    }
}
