<?php

namespace App\Livewire\Config;

use App\Models\Materia;
use Livewire\Component;

class CrearMaterias extends Component
{
    public $formularios = []; // Array para almacenar los datos de cada formulario

    public function mount()
    {
        $this->agregarFormulario(); // Iniciamos con un formulario
    }

    public function agregarFormulario()
    {
        $this->formularios[] = ['nombre' => '', 'user_id' => auth()->user()->id];
    }
    public function eliminarFormulario($index)
    {
        unset($this->formularios[$index]);
    }

    public function crearMaterias()
    {
        $this->validate([
            'formularios.*.nombre' => 'required|string|max:255',
        ],
        [
            'formularios.*.nombre.required' => 'El nombre de la materia es obligatorio',
            'formularios.*.nombre.string' => 'El nombre de la materia debe ser una cadena de texto',
            'formularios.*.nombre.max' => 'El nombre de la materia debe tener un máximo de 255 caracteres',
        ]);

        foreach ($this->formularios as $formulario) {
            Materia::create($formulario);
        }

        //redirigir a la vista de materias sin recargar la pagina
        return $this->redirect(route('materias.clases', ['dia' => 'Lunes']), navigate: true);
    }

    public function render()
    {
        return view('livewire.config.crear-materias');
    }

}
