<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/cek-db', function () {
    return DB::table('users')->get();
    });
Route::get('/', [SignInController::class, 'create'])->name('login'); // Anda bisa menamakannya 'login' atau 'signin.form' atau 'home'
Route::post('/', [SignInController::class, 'store'])->name('login.attempt'); // Proses login
Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'handleLinkRequest'])->name('password.email'); // Sebenarnya ini bukan kirim email di alur Anda, tapi nama route umum

Route::get('/reset-password/verify-code', [ForgotPasswordController::class, 'showVerificationForm'])->name('password.show.verification.form');
Route::post('/reset-password/verify-code', [ForgotPasswordController::class, 'handleVerificationCode'])->name('password.verify.code');