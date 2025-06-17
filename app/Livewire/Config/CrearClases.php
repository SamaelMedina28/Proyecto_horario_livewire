<?php

namespace App\Livewire\Config;

use App\Models\Clase;
use Livewire\Component;

class CrearClases extends Component
{
    // Variables para funcionalidad de los dias
    public $diaActual;
    public $diaSiguiente;
    public $mostrarTerminar = false;
    protected $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];

    public $materia;
    public $salon;
    public $edificio;
    public $profesor;
    public $hora_inicio;
    public $hora_fin;

    
    public $materias;
    public function render()
    {
        return view('livewire.config.crear-clases');
    }
    public function mount($dia, $materias)
    {
        $this->diaActual = $dia;
        $this->materias = $materias;
        $this->calcularSiguienteDia();
    }
    public function calcularSiguienteDia()
    {
        $indiceActual = array_search($this->diaActual, $this->dias);
        $indiceSiguiente = ($indiceActual + 1) % count($this->dias);

        $this->diaSiguiente = $this->dias[$indiceSiguiente];
        $this->mostrarTerminar = ($this->diaSiguiente === 'lunes');
    }
    // public function siguienteDia()
    // {
    //     if ($this->mostrarTerminar) {
    //         return $this->redirect(route('welcome'), navigate: true);
    //     }

    //     $this->diaActual = $this->diaSiguiente;
    //     $this->calcularSiguienteDia();

    //     // Actualizar la URL sin recargar la página
    //     return $this->redirect("/clases/{$this->diaActual}", navigate: true);
    // }
    public function crearClases()
    {
        $this->validate([
            'materia' => 'required',
            'salon' => 'required',
            'diaActual' => 'required',
            'edificio' => 'required',
            'profesor' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ],[
            'materia.required' => 'Debes seleccionar una materia',
            'salon.required' => 'Debes ingresar un salon',
            'diaActual.required' => 'Debes ingresar un dia',
            'edificio.required' => 'Debes ingresar un edificio',
            'profesor.required' => 'Debes ingresar un profesor',
            'hora_inicio.required' => 'Debes ingresar una hora de inicio',
            'hora_fin.required' => 'Debes ingresar una hora de fin',
        ]);

        Clase::create([
            'materia_id' => $this->materia,
            'dia' => $this->diaActual,
            'user_id' => auth()->user()->id,
            'salon' => $this->salon,
            'edificio' => $this->edificio,
            'profesor' => $this->profesor,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
        ]);

        $this->redirect(route('materias.clases', ['dia' => $this->diaSiguiente]), navigate: true);
    }
}
