<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\OrgProfileReviewsController;
use App\Http\Controllers\OrgProfileHistoryController;
use App\Http\Controllers\OrgProfileHelpController;

// Rute untuk halaman profil utama
Route::get('/', [OrganizerController::class, 'profile'])->name('show');

// --- RUTE UNTUK REVIEWS (DIPERBAIKI) ---
// Rute utama, mengarah ke metode index()
Route::get('/reviews', [OrgProfileReviewsController::class, 'index'])->name('reviews');
// Rute untuk menampilkan ulasan spesifik, mengarah ke metode show()
Route::get('/reviews/{event}', [OrgProfileReviewsController::class, 'show'])->name('reviews.show');

// Rute untuk halaman History
Route::get('/history', [OrgProfileHistoryController::class, 'index'])->name('history');

// Rute untuk halaman Help Center
Route::get('/help', [OrgProfileHelpController::class, 'index'])->name('help');
Route::post('/help', [OrgProfileHelpController::class, 'sendQuestion'])->name('help.send');