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
        $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes'];
        // Obtener el día actual en español
        $diaActual = strtolower(date('l')); // Día en inglés
        $diasIngles = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $diasEspanol = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        $diaActual = str_replace($diasIngles, $diasEspanol, $diaActual);

        // Si es fin de semana, mostrar el lunes
        if (!in_array($diaActual, $dias)) {
            $diaActual = 'lunes';
        }
        // Consulta
        $clases = auth()->user()->clases()->get();
        return view('shows.index', compact('clases', 'diaActual','dias'));
    }
    public function show($id)
    {
        $clase = auth()->user()->clases()->where('id', $id)->get();
        return view('shows.clase', compact('clase'));
    }
}
