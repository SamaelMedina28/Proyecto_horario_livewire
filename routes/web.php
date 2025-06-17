<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\config\MateriasController;

Route::get('/', function () {
    return "Entraste a la vista principal";
})->middleware('auth', 'isNew')->name('welcome');

Route::get('/materias', [MateriasController::class, 'index'])->middleware('auth')->name('materias.index');


// Route::get('/dia/{dia}', function ($dia) {
//     return view('dashboard', ['dia' => $dia]);
// })->middleware(['isNew', 'auth:sanctum']);

// Route::get('/prueba', function () {
//     return view('prueba.prueba');
// })->name('prueba');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
