<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function index()
    {
        return view('config.materias');
    }

    public function clases($dia)
    {
        return "Aqui se añadiran las clases del dia: " . $dia;
        return view('config.clases', compact('dia'));
    }
}
