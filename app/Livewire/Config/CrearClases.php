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

    public $clases = [];

    
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
        $this->agregarClase();
    }
    public function calcularSiguienteDia()
    {
        $indiceActual = array_search($this->diaActual, $this->dias);
        $indiceSiguiente = ($indiceActual + 1) % count($this->dias);

        $this->diaSiguiente = $this->dias[$indiceSiguiente];
        $this->mostrarTerminar = ($this->diaSiguiente === 'lunes');
    }
/*     public function siguienteDia()
    {
        if ($this->mostrarTerminar) {
            return $this->redirect(route('welcome'), navigate: true);
        }

        $this->diaActual = $this->diaSiguiente;
        $this->calcularSiguienteDia();

        // Actualizar la URL sin recargar la página
        return $this->redirect("/clases/{$this->diaActual}", navigate: true);
    } */
    public function crearClases()
    {
        $this->validate([
            'clases.*.materia_id' => 'required',
            'clases.*.salon' => 'required',
            'clases.*.dia' => 'required',
            'clases.*.edificio' => 'required',
            'clases.*.profesor' => 'required',
            'clases.*.hora_inicio' => 'required',
            'clases.*.hora_fin' => 'required',
        ],
        [
            'clases.*.materia_id.required' => 'Debes seleccionar una materia',
            'clases.*.salon.required' => 'Debes ingresar un salon',
            'clases.*.dia.required' => 'Debes ingresar un dia',
            'clases.*.edificio.required' => 'Debes ingresar un edificio',
            'clases.*.profesor.required' => 'Debes ingresar un profesor',
            'clases.*.hora_inicio.required' => 'Debes ingresar una hora de inicio',
            'clases.*.hora_fin.required' => 'Debes ingresar una hora de fin',
        ]
    );

        foreach ($this->clases as $clase) {
            Clase::create($clase);
        }
        if ($this->mostrarTerminar) {
            //Hacer que el campo "Nuevo" del usuario autenticado cambie a 0
            auth()->user()->update(['nuevo' => 0]);
            return $this->redirect(route('welcome'), navigate: true);
        }

        $this->redirect(route('materias.clases', ['dia' => $this->diaSiguiente]), navigate: true);
    }
    public function agregarClase()
    {
        $this->clases[] = [
            'materia_id' => '',
            'dia' => $this->diaActual,
            'user_id' => auth()->user()->id,
            'salon' => '',
            'edificio' => '',
            'profesor' => '',
            'hora_inicio' => '08:00',
            'hora_fin' => '09:00',
        ];
    }
}
