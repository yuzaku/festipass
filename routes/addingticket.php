<!-- 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcertTicketController;

Route::view('/managetickets', 'concert_ticket_edit'); -->

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcertTicketController; // Pastikan namespace ini benar

// Mengarahkan URL /managetickets ke metode showPage di ConcertTicketController
// dan memberinya nama 'managetickets.show'
Route::get('/managetickets', [ConcertTicketController::class, 'showPage'])
     ->name('managetickets.show');