<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class DiaPrueba extends Component
{
    public $diaActual;
    public $diaSiguiente;
    public $mostrarTerminar = false;

    protected $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];

    public function mount($dia)
    {
        $this->diaActual = $dia;
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
        $this->dispatch('urlChanged', url: "/dia/{$this->diaActual}");
    }

    public function render()
    {
        return view('livewire.dia-prueba');
    }
}
