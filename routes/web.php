<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelayanController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\BerandaController;

/*
|--------------------------------------------------------------------------
| BERANDA
|--------------------------------------------------------------------------
*/
Route::get('/test-health', function () {
    return 'OK';
});

Route::get('/', [BerandaController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
});

/*
|--------------------------------------------------------------------------
| AREA LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('pelayan', PelayanController::class);
    Route::resource('jemaat', JemaatController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('pengumuman', PengumumanController::class);

    Route::get('/keuangan/export', [KeuanganController::class, 'exportExcel'])
        ->name('keuangan.export');

    Route::resource('keuangan', KeuanganController::class)
        ->only(['index', 'store', 'destroy', 'edit', 'update']);
});