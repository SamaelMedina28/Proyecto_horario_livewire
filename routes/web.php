<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\config\MateriasController;
use App\Http\Controllers\config\ClasesController;


// ? Rutas para mostrar todas las clases
Route::get('/', [ClasesController::class, 'index'])->middleware('auth', 'isOld')->name('welcome');
Route::get('/clase/{id}', [ClasesController::class, 'show'])->middleware('auth', 'isOld')->name('clases.show');

// ? Rutas para crear
Route::get('/config/materias', [MateriasController::class, 'index'])->middleware('auth', 'isNew')->name('materias.index');
Route::get('/config/clases/{dia}', [MateriasController::class, 'clases'])->middleware('auth', 'isNew')->name('materias.clases');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
