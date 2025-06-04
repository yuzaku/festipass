<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookTicket\TicketSelectionController;

Route::get('/select-ticket/{event}', [TicketSelectionController::class, 'show'])->name('/book-ticket/select-ticket');
Route::view('/select-ticket/book', '/book-ticket/book-ticket');
Route::view('/select-ticket/order-details', '/book-ticket/order-details');
Route::view('/select-ticket/order-details/select-payment', '/book-ticket/select-payment');
