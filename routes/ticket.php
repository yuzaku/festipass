<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookTicket\TicketSelectionController;
use App\Http\Controllers\BookTicket\TicketOrderController;

Route::get('/select-ticket/{event}', [TicketSelectionController::class, 'show'])->name('show.ticket');
Route::get('/select-ticket/book/{ticket}', [TicketSelectionController::class, 'book'])->name('book.ticket');
Route::post('/select-ticket/order/{ticket}', [TicketOrderController::class, 'order'])->name('order.ticket');
Route::get('/select-ticket/order-details/{orderId}', [TicketOrderController::class, 'order_details'])->name('order.details');
Route::get('/select-ticket/order-details/select-payment/{order}', [TicketOrderController::class, 'selectPayment'])->name('order.payment.form');
Route::post('/select-ticket/order-details/select-payment/{order}', [TicketOrderController::class, 'savePayment'])->name('order.payment.save');
Route::post('/orders/{order}/pay', [TicketOrderController::class, 'pay'])->name('order.pay');
Route::get('/ticket-detail', function () {
    return view('ticket.ticketdetail1');
});
Route::get('/ticket-detail2', function () {
    return view('ticket.ticketdetail2');
});
Route::get('/ticket-detail3', function () {
    return view('ticket.ticketdetail3');
});
