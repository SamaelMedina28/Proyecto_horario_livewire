<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\config\MateriasController;
use App\Models\Clase;

Route::get('/', function () {
    //Obtener el dia actual
    // Obtener el día en inglés
    $diaIngles = strtolower(date('l')); // Ej: "monday"

    // Mapeo de días inglés -> español
    $diasTraducidos = [
        'monday'    => 'lunes',
        'tuesday'   => 'martes',
        'wednesday' => 'miercoles',
        'thursday'  => 'jueves',
        'friday'    => 'viernes',
        'saturday'  => 'sabado',
        'sunday'    => 'domingo'
    ];

    // Obtener el día en español
    $diaActual = $diasTraducidos[$diaIngles];

    // Consulta
    $clases = auth()->user()->clases()->where('dia', $diaActual)->get();
    return $clases;
})->middleware('auth', 'isOld')->name('welcome');

Route::get('/materias', [MateriasController::class, 'index'])->middleware('auth', 'isNew')->name('materias.index');
Route::get('/{dia}', function ($dia) {
    $clases = auth()->user()->clases()->where('dia', $dia)->get();
    return $clases;
})->middleware('auth', 'isOld')->name('clases');


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
