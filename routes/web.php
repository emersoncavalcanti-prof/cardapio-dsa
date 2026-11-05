<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => auth()->check() ? redirect()->route('admin') : view('home'))
    ->name('home');

Route::get('/login', fn () => redirect()->route('home'))
    ->name('login');

Route::middleware('auth')->group(function () {
    Route::view('/admin', 'admin')->name('admin');

    Route::post('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');
    })->name('logout');
});
