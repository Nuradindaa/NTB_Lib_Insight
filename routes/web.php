<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

/*
| Dashboard Ringkasan
*/

Route::get('/', [DashboardController::class, 'ringkasan'])
    ->name('dashboard.ringkasan');

/*
| Dashboard Akreditasi
*/

Route::get('/dashboard-akreditasi', [DashboardController::class, 'index'])
    ->name('dashboard.akreditasi');

/*
| Dashboard Pemetaan
*/

Route::get('/dashboard-pemetaan', [DashboardController::class, 'pemetaan'])
    ->name('dashboard.pemetaan');

Route::middleware('auth')->group(function () {

    // nanti route tambah/edit/hapus disini

});