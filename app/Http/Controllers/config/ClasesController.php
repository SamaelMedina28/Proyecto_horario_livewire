<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Clase;

class ClasesController extends Controller
{
    public function index()
    {
        // Obtener el día en español
        $diaActual = Carbon::now()->locale('es')->dayName;
        // Consulta
        $clases = auth()->user()->clases()->get();
        return view('shows.index', compact('clases', 'diaActual'));
    }
    public function show($id)
    {
        $clase = auth()->user()->clases()->where('id', $id)->get();
        return view('shows.clase', compact('clase'));
    }
}
