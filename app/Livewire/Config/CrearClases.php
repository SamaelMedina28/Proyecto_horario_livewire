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
    public function siguienteDia()
    {
        if ($this->mostrarTerminar) {
            return $this->redirect(route('welcome'), navigate: true);
        }

        $this->diaActual = $this->diaSiguiente;
        $this->calcularSiguienteDia();

        // Actualizar la URL sin recargar la página
        return $this->redirect("/clases/{$this->diaActual}", navigate: true);
    }
}
