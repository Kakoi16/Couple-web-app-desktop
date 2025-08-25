<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MapboxController;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return view('welcome');
});

// Grup route hanya untuk user login & verified
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard menu
    Route::get('/maps', [DashboardController::class, 'maps'])->name('maps.index');
    Route::get('/camera', [DashboardController::class, 'camera'])->name('camera.index');
    Route::get('/posisi', [DashboardController::class, 'position'])->name('position.index');

    // Mapbox API
    Route::get('/mapbox/geocode', [MapboxController::class, 'geocode']);
    Route::get('/mapbox/token', [MapboxController::class, 'getToken'])->name('mapbox.token');
    Route::get('/mapbox/users', [MapboxController::class, 'getUsersLocation'])->name('mapbox.users');
    Route::post('/mapbox/update-location', [MapboxController::class, 'updateLocation'])->name('mapbox.updateLocation');

    // Location API
    Route::post('/location/update', [LocationController::class, 'update']);
    Route::get('/location/all', [LocationController::class, 'getAll']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route otentikasi Breeze
require __DIR__.'/auth.php';
