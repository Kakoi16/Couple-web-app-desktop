<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController; // Tambahkan ini
use App\Http\Controllers\MapboxController;
// Halaman landing/welcome standar
Route::get('/', function () {
    return view('welcome');
});

// Grup route yang hanya bisa diakses setelah login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/maps', [DashboardController::class, 'maps'])->name('maps.index');
    Route::get('/camera', [DashboardController::class, 'camera'])->name('camera.index');
    Route::get('/posisi', [DashboardController::class, 'position'])->name('position.index');
Route::get('/mapbox/geocode', [MapboxController::class, 'geocode']);
    // Route untuk profil (bawaan breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Ini akan memuat semua route otentikasi dari Breeze
require __DIR__.'/auth.php';