<?php
use App\Http\Controllers\TicketController;

Route::get('/my-tickets', [\App\Http\Controllers\TicketController::class, 'myTickets'])
      ->middleware('auth')
      ->name('my.tickets');
Route::get('/ticketlist', [\App\Http\Controllers\TicketController::class, 'history'])
      ->middleware('auth')
      ->name('ticket.list');
Route::get('/ticket-detail/{order}', [TicketController::class, 'detail'])
      ->middleware('auth')
      ->name('ticket.detail');
Route::post('/events/{event}/review', [TicketController::class, 'store'])
     ->middleware('auth')
     ->name('event.review');
