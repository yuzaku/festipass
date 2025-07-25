<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ProfileController;

require __DIR__ . '/ticket.php';
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

    // User dashboard (will be overridden by HomepageUserController below)

    // Profile routes
    Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/request-organizer', [ProfileController::class, 'requestOrganizer'])->name('profile.request-organizer');

    // Organizer request routes
    Route::get('/organizer/request', [ProfileController::class, 'showOrganizerRequest'])->name('organizer.request');
    Route::post('/organizer/request', [ProfileController::class, 'storeOrganizerRequest'])->name('organizer.request.store');
});

    // Organizer routes - COMMENTED OUT: Replaced with OrganizerController dashboard
    // Route::middleware(['organizer'])->prefix('organizer')->name('organizer.')->group(function () {
    //     Route::get('/dashboard', function() {
    //         $user = auth()->user();
    //         $stats = [
    //             'total_events' => 0, // Implement sesuai kebutuhan
    //             'active_events' => 0,
    //             'total_participants' => 0,
    //         ];
    //         return view('organizer.dashboard', compact('user', 'stats'));
    //     })->name('dashboard');
    // });
});

use App\Http\Controllers\ReportController;

Route::get('/report', [ReportController::class, 'create'])->name('report.create');
Route::post('/report', [ReportController::class, 'store'])->name('report.store');

use App\Http\Controllers\YoReportsController;

Route::get('/your-reports', [YoReportsController::class, 'index'])->name('your.reports');


use App\Http\Controllers\ConcertController;

Route::get('/concert-details/{id}', [ConcertController::class, 'show'])->name('concert.details');



require __DIR__ . '/dashboard.php';
require __DIR__ . '/myticket.php';
// HomepageUser
use App\Http\Controllers\HomepageUser\HomepageUserController;

Route::get('/dashboard', [HomepageUserController::class, 'index'])->name('dashboard');

require __DIR__ . '/addingticket.php';
require __DIR__ . '/newtickettype.php';

use App\Http\Controllers\OrganizerController;

// Routes untuk Organizer Dashboard
Route::prefix('organizer')->name('organizer.')->group(function () {

    // Dashboard utama
    Route::get('/dashboard', [OrganizerController::class, 'dashboard'])->name('dashboard');

    // Concerts management
    Route::get('/concerts', [OrganizerController::class, 'concerts'])->name('concerts');
    Route::get('/concerts/create', [OrganizerController::class, 'createConcert'])->name('concerts.create');
    Route::post('/concerts', [OrganizerController::class, 'storeConcert'])->name('concerts.store');
    Route::get('/concerts/{id}/edit', [OrganizerController::class, 'editConcert'])->name('concerts.edit');
    Route::put('/concerts/{id}', [OrganizerController::class, 'updateConcert'])->name('concerts.update');
    Route::delete('/concerts/{id}', [OrganizerController::class, 'deleteConcert'])->name('concerts.delete');

    // AJAX Routes for statistics
    Route::get('/concerts/{id}/stats', [OrganizerController::class, 'getConcertStats'])->name('concerts.stats');

    // Sales reports
    Route::get('/reports', [OrganizerController::class, 'reports'])->name('reports');

    // Profile
    Route::get('/profile', [OrganizerController::class, 'profile'])->name('profile');
    Route::put('/profile', [OrganizerController::class, 'updateProfile'])->name('profile.update');

});



use App\Http\Controllers\ConcertTicketController; // Pastikan ini di-import

// ... (kode guest routes, authenticated routes lainnya) ...


// == MANAGE CONCERT TICKET (DI LUAR AUTH DAN ORGANIZER UNTUK SAAT INI) ==
Route::prefix('manageconcertticket')      // Kita tetap menggunakan prefix URL
     ->name('manageconcertticket.')       // Kita tetap menggunakan prefix nama rute
     ->group(function () {

    // Rute untuk menampilkan halaman utama "Manage Ticket" (View 1)
    Route::get('/', [ConcertTicketController::class, 'showPage'])->name('show');

    // Rute BARU untuk menampilkan form "Adding New Tickets" (View 2)
    Route::get('/add-ticket-type', [ConcertTicketController::class, 'showAddTicketForm'])->name('add_form');

    // Rute untuk memproses form penambahan tiket bisa ditambahkan di sini nanti
    // Route::post('/store-ticket-type', [ConcertTicketController::class, 'storeTicketType'])->name('store_type');
});
// == AKHIR DARI GRUP MANAGE CONCERT TICKET ==

// Help Center
use App\Http\Controllers\OrgProfileHelpController;

Route::get('organizer/profile/help', [OrgProfileHelpController::class, 'index'])->name('orgprofilehelp.index');
Route::post('organizer/profile/help', [OrgProfileHelpController::class, 'sendQuestion'])->name('orgprofilehelp.send');


//Sales Report
use App\Http\Controllers\SalesReportController;

Route::get('/organizer/salesreport', [SalesReportController::class, 'index'])->name('salesreport.index');

//History
use App\Http\Controllers\OrgProfileHistoryController;
Route::get('organizer/profile/history', [OrgProfileHistoryController::class, 'index'])->name('organizer.history');

use App\Http\Controllers\OrgProfileReviewsController;

// Rute untuk halaman Reviews
Route::get('/organizer/profile/reviews', [OrgProfileReviewsController::class, 'index'])->name('organizer.profile.reviews');

// Rute untuk menampilkan ulasan event spesifik
Route::get('/organizer/profile/reviews/{event}', [OrgProfileReviewsController::class, 'show'])
     ->name('organizer.profile.reviews.show');
