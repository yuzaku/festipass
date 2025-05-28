<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ProfileController;

// Test database connection
Route::get('/cek-db', function () {
    try {
        DB::connection()->getPdo();
        $users = DB::table('users')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Database connected successfully',
            'database' => DB::connection()->getDatabaseName(),
            'users_count' => $users->count(),
            'users' => $users
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Database connection failed',
            'error' => $e->getMessage()
        ], 500);
    }
});

// Guest routes (hanya bisa diakses jika belum login)
Route::middleware('guest')->group(function () {
    // Authentication routes
    Route::get('/', [SignInController::class, 'create'])->name('login');
    Route::post('/', [SignInController::class, 'store'])->name('login.attempt');

    // Registration routes
    Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    // Forgot Password routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'handleLinkRequest'])->name('password.email');
    Route::get('/reset-password/verify-code', [ForgotPasswordController::class, 'showVerificationForm'])->name('password.show.verification.form');
    Route::post('/reset-password/verify-code', [ForgotPasswordController::class, 'handleVerificationCode'])->name('password.verify.code');
    Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'handleReset'])->name('password.update');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Logout route
    Route::post('/logout', [SignInController::class, 'destroy'])->name('logout');

    // User dashboard
    Route::get('/dashboard', function() {
        $user = auth()->user();
        return view('dashboard', compact('user'));
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Organizer routes
    Route::middleware(['organizer'])->prefix('organizer')->name('organizer.')->group(function () {
        Route::get('/dashboard', function() {
            $user = auth()->user();
            $stats = [
                'total_events' => 0, // Implement sesuai kebutuhan
                'active_events' => 0,
                'total_participants' => 0,
            ];
            return view('organizer.dashboard', compact('user', 'stats'));
        })->name('dashboard');
    });
});

use App\Http\Controllers\ReportController;

Route::get('/report', [ReportController::class, 'create'])->name('report.create');
Route::post('/report', [ReportController::class, 'store'])->name('report.store');

use App\Http\Controllers\YoReportsController;

Route::get('/your-reports', [YoReportsController::class, 'index'])->name('your.reports');

require __DIR__ . '/addingticket.php';