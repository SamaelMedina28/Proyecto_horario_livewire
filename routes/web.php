<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dia/{dia}', function ($dia) {
    return view('dashboard', ['dia' => $dia]);
})->middleware(['isNew', 'auth:sanctum']);

Route::get('/prueba', function () {
    return view('prueba.prueba');
})->name('prueba');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
