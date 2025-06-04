<?php
use Illuminate\Support\Facades\Route;

Route::view('/select-ticket', '/book-ticket/select-ticket');
Route::view('/select-ticket/book', '/book-ticket/book-ticket');
Route::view('/select-ticket/order-details', '/book-ticket/order-details');
Route::view('/select-ticket/order-details/select-payment', '/book-ticket/select-payment');
