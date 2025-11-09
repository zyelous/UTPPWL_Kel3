<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth (login/register)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Admin area (CRUD)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('films', FilmController::class);
    Route::resource('genres', GenreController::class);
});

// User area
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [FilmController::class, 'showForUser'])->name('user.home');
    Route::get('/genre', [FilmController::class, 'showGenresForUser'])->name('user.genre');
    Route::get('/genre/{name}', [FilmController::class, 'showFilmByGenre'])->name('user.genre.show');

     // Route DETAIL film (tonton sekarang -> deskripsi)
    Route::get('/film/{film}', [FilmController::class, 'showFilmDetail'])->name('user.film.show');       
});

// Route publik agar user bisa lihat daftar film
Route::get('/films', [FilmController::class, 'index'])->name('films.index');