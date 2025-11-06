<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| File ini berisi semua route untuk aplikasi Daftar Film Favorit.
|
*/

// 👇 Jika belum login, arahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// ============================
// 🔐 AUTHENTICATION ROUTES
// ============================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// ============================
// 🔒 PROTECTED ROUTES
// ============================
Route::middleware(['auth'])->group(function () {
    // CRUD Film untuk semua user yang login
    Route::resource('films', FilmController::class);

    // CRUD Genre hanya bisa diakses oleh admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('genres', GenreController::class);
    });
});
