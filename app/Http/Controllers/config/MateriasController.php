<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materia;

class MateriasController extends Controller
{
    public function index()
    {
        return view('config.materias');
    }

    public function clases($dia)
    {
        $materias = Materia::where('user_id', auth()->user()->id)->get();
        return view('config.clases', compact('dia', 'materias'));
    }
}
