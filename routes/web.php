<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ReportController;

Route::get('/report', [ReportController::class, 'create'])->name('report.create');
Route::post('/report', [ReportController::class, 'store'])->name('report.store');

use App\Http\Controllers\YoReportsController;

Route::get('/your-reports', [YoReportsController::class, 'index'])->name('your.reports');
