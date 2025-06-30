<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcertTicketController;

// Rute yang sudah ada...
Route::get('/managetickets/{concert}/edit', [ConcertTicketController::class, 'edit'])->name('managetickets.edit');
Route::get('/managetickets/{concert}/add-ticket', [ConcertTicketController::class, 'showAddTicketForm'])->name('managetickets.add_form');
Route::post('/managetickets/{concert}/add-ticket', [ConcertTicketController::class, 'storeTicket'])->name('managetickets.store_ticket');

// --- RUTE BARU UNTUK EDIT TIKET ---

// Rute untuk MENAMPILKAN form edit tiket tertentu (GET)
// URL-nya akan terlihat seperti: /managetickets/1/ticket/2/edit
Route::get('/managetickets/{concert}/ticket/{ticket}/edit', [ConcertTicketController::class, 'editTicket'])
     ->name('managetickets.ticket.edit');

// Rute untuk MENYIMPAN perubahan pada tiket tertentu (PUT/PATCH)
Route::put('/managetickets/{concert}/ticket/{ticket}', [ConcertTicketController::class, 'updateTicket'])
     ->name('managetickets.ticket.update');

Route::delete('/managetickets/{concert}/ticket/{ticket}', [ConcertTicketController::class, 'destroyTicket'])
     ->name('managetickets.ticket.destroy');