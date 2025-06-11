<?php

namespace App\Livewire;

use App\Models\Materia;
use Livewire\Component;

class CreateForm extends Component
{
    public $materias = [];
    public $formularios = []; // Array para almacenar los datos de cada formulario

    public function mount()
    {
        $this->cargarMaterias();
        $this->agregarFormulario(); // Iniciamos con un formulario
    }

    public function cargarMaterias()
    {
        $this->materias = Materia::all();
    }

    public function agregarFormulario()
    {
        $this->formularios[] = ['nombre' => '', 'codigo' => ''];
    }

    public function crearMaterias()
    {
        $this->validate([
            'formularios.*.nombre' => 'required|string|max:255',
            'formularios.*.codigo' => 'required|string|max:50'
        ]);

        foreach ($this->formularios as $formulario) {
            Materia::create($formulario);
        }

        $this->formularios = [['nombre' => '', 'codigo' => '']]; // Resetear con un formulario
        $this->cargarMaterias();
    }

    public function eliminarMateria($id)
    {
        Materia::destroy($id);
        $this->cargarMaterias();
    }

    public function render()
    {
        return view('livewire.create-form');
    }
}
