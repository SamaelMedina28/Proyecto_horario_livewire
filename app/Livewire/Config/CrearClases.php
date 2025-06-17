<?php

namespace App\Livewire\Config;

use Livewire\Component;

class CrearClases extends Component
{
    public $dia;
    public $materias;
    public function render()
    {
        return view('livewire.config.crear-clases');
    }
    public function mount($dia, $materias)
    {
        $this->dia = $dia;
        $this->materias = $materias;
    }
}
