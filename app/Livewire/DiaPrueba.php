<?php

namespace App\Livewire;

use Livewire\Component;

class DiaPrueba extends Component
{
    public $diaActual;
    protected $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];

    public function mount($dia)
    {
        $this->diaActual = $dia;
    }
    public function siguienteDia()
    {
        if ($this->diaActual == 'sabado' || $this->diaActual == 'domingo') {
            $this->diaActual = 'Dia final';
        } else {
            $this->diaActual = $this->dias[(array_search($this->diaActual, $this->dias) + 1)];
        }
        header("Location: /dia/{$this->diaActual}");
        exit;
    }
    public function render()
    {
        return view('livewire.dia-prueba');
    }
}
