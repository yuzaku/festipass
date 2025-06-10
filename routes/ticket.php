<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookTicket\TicketSelectionController;
use App\Http\Controllers\BookTicket\TicketOrderController;

Route::get('/select-ticket/{event}', [TicketSelectionController::class, 'show'])->name('show.ticket');
Route::get('/select-ticket/book/{ticket}', [TicketSelectionController::class, 'book'])->name('book.ticket');
Route::post('/select-ticket/order/{ticket}', [TicketOrderController::class, 'order'])->name('order.ticket');
Route::get('/select-ticket/order-details/{orderId}', [TicketOrderController::class, 'order_details'])->name('order.details');
Route::view('/select-ticket/order-details/select-payment', '/book-ticket/select-payment');
