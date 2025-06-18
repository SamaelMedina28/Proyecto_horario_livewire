<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\config\MateriasController;
use App\Http\Controllers\config\ClasesController;


// Rutas con middleware 'auth' y 'isOld'
Route::middleware(['auth', 'isOld'])->group(function () {
    // ? Rutas para mostrar todas las clases
    Route::get('/', [ClasesController::class, 'index'])->name('welcome');
    Route::get('/clase/{id}', [ClasesController::class, 'show'])->name('clases.show');
});

// Rutas con middleware 'auth' y 'isNew'
Route::middleware(['auth', 'isNew'])->group(function () {
    // ? Rutas para crear
    Route::get('/config/materias', [MateriasController::class, 'index'])->name('materias.index');
    Route::get('/config/clases/{dia}', [MateriasController::class, 'clases'])->name('materias.clases');
});

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');});
 */