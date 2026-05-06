<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcardController;
use App\Livewire\CreateEcard;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('guest.home'))->name('home');
Route::get('/about', fn () => view('guest.about'))->name('about');
Route::get('/contact', fn () => view('guest.contact'))->name('contact');

/*
|--------------------------------------------------------------------------
| Auth Pages
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login', fn () => view('auth.login'))->name('login');

// Dashboard
Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile
Route::get('/profile', fn () => view('profile'))
    ->middleware('auth')
    ->name('profile');

/*
|--------------------------------------------------------------------------
| E-CARDS SYSTEM
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |----------------------------------------
    | CREATE ROUTES (BOTH SUPPORTED)
    |----------------------------------------
    */

    // Livewire Create Page (PRIMARY)
    Route::get('/ecard/create', CreateEcard::class)
        ->name('ecard.create');

    // ALIAS CREATE ROUTE (OLD NAME - USICHANGE BLADE ZAKO)
    Route::get('/ecard/create-ecard', CreateEcard::class)
        ->name('create-ecard');

    /*
    |----------------------------------------
    | HISTORY
    |----------------------------------------
    */

    Route::get('/ecards/history', [EcardController::class, 'history'])
        ->name('ecards.history');

    /*
    |----------------------------------------
    | SHOW SINGLE ECARD
    |----------------------------------------
    */

    Route::get('/ecards/{id}', [EcardController::class, 'show'])
        ->name('ecard.show');

    /*
    |----------------------------------------
    | DELETE ECARD
    |----------------------------------------
    */

    
});

/*
|--------------------------------------------------------------------------
| PUBLIC ECARD VIEW
|--------------------------------------------------------------------------
*/

Route::get('/ecard/{phone}', function ($phone) {
    return "Ecard ya: " . $phone;
});

Route::get('/scan/{code}', [EcardController::class, 'scan'])
    ->name('ecard.scan');
/*
|--------------------------------------------------------------------------
| AUTH FILE
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {
    auth()->logout();
    return redirect()->route('home');
})->name('logout');

require __DIR__.'/auth.php';