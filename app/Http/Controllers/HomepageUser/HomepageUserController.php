<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    /**
     * Show organizer dashboard
     */
    public function dashboard()
    {
        // Sample data - nanti akan diganti dengan data dari database
        $totalConcerts = 0;
        $ticketsSold = 0;
        $totalRevenue = 0;
        $averageRating = 0.0;

        return view('organizer.dashboard', compact(
            'totalConcerts',
            'ticketsSold',
            'totalRevenue',
            'averageRating'
        ));
    }

    /**
     * Show concerts management page
     */
    public function concerts()
    {
        // Sample data - akan diganti dengan data dari database
        $totalConcerts = 0;
        $ticketsSold = 0;
        $totalRevenue = 0;
        $averageRating = 0.0;
        $concerts = []; // Array kosong untuk sekarang

        return view('organizer.concerts.manager', compact(
            'totalConcerts',
            'ticketsSold',
            'totalRevenue',
            'averageRating',
            'concerts'
        ));
    }

    /**
     * Show create concert form
     */
    public function createConcert()
    {
        return view('organizer.concerts.create');
    }

    /**
     * Store new concert
     */
    public function storeConcert(Request $request)
    {
        // Logic untuk menyimpan concert akan ditambahkan nanti
        // Validasi form, upload image, simpan ke database

        return redirect()->route('organizer.concerts')->with('success', 'Concert created successfully!');
    }

    /**
     * Show edit concert form
     */
    public function editConcert($id)
    {
        // Mock data for demo - nanti akan diambil dari database berdasarkan $id
        $concert = (object) [
            'id' => $id,
            'name' => 'ADO World Tour 2025 - Jakarta',
            'location' => 'Indonesia Convention Exhibition (ICE), BSD City',
            'date' => '2025-09-15',
            'time' => '19:30',
            'artist' => 'ADO',
            'description' => 'Experience the phenomenal Japanese singer ADO live in Jakarta! Known for her powerful vocals and hit songs like "Usseewa", "Show", and "New Genesis". This will be her first concert in Indonesia as part of the ADO World Tour 2025.',
            'image' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=400&h=250&fit=crop',
            'status' => 'published',
            'tickets_sold' => 892,
            'revenue' => 178400000,
            'available_tickets' => 108
        ];

        return view('organizer.concerts.edit', compact('concert'));
    }

    /**
     * Update concert
     */
    public function updateConcert(Request $request, $id)
    {
        // Logic untuk update concert akan ditambahkan nanti
        // Validasi form, upload image, update database

        return redirect()->route('organizer.concerts')->with('success', 'Concert updated successfully!');
    }

    /**
     * Show sales reports
     */
    public function reports()
    {
        return view('organizer.reports');
    }

    /**
     * Show organizer profile
     */
    public function profile()
    {
        return view('organizer.profile');
    }
}
