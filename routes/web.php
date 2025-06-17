<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\config\MateriasController;
use App\Models\Clase;

Route::get('/', function () {
    $clases = auth()->user()->clases()->where('dia', 'domingo')->get();
    return $clases;
})->middleware('auth', 'isOld')->name('welcome');

Route::get('/materias', [MateriasController::class, 'index'])->middleware('auth', 'isNew')->name('materias.index');

Route::get('/clases/{dia}', [MateriasController::class, 'clases'])->middleware('auth', 'isNew')->name('materias.clases');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
