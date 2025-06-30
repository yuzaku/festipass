<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddtickettypeController; // Pastikan namespace ini benar

// Mengarahkan URL /addnewticket ke metode showPage di AddtickettypeController
// dan memberinya nama 'addnewticket.form'
Route::get('/addnewticket', [AddtickettypeController::class, 'showPage'])
     ->name('addnewticket.form');