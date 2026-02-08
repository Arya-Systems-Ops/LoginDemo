<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Startseite: Wer hier landet, wird direkt zum Login geschickt
Route::get('/', function () {
    return redirect()->route('login');
});

// Diese Routen sind nur für Leute, die noch NICHT eingeloggt sind (Gäste)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Dieser Bereich ist sicher – nur wer angemeldet ist, kommt hier rein
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
