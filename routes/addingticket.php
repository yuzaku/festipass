<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcertTicketController;

// Rute untuk menampilkan halaman edit konser (GET)
Route::get('/managetickets/{concert}/edit', [ConcertTicketController::class, 'edit'])
     ->name('managetickets.edit');

// Rute untuk menampilkan form tambah tiket (GET)
Route::get('/managetickets/{concert}/add-ticket', [ConcertTicketController::class, 'showAddTicketForm'])
     ->name('managetickets.add_form');

// RUTE BARU: Untuk menyimpan data tiket dari form (POST)
Route::post('/managetickets/{concert}/add-ticket', [ConcertTicketController::class, 'storeTicket'])
      ->name('managetickets.store_ticket');