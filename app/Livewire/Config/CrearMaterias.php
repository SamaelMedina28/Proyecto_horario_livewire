<?php

namespace App\Livewire\Config;

use App\Models\Materia;
use Livewire\Component;

class CrearMaterias extends Component
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
        $this->materias = Materia::where('user_id', auth()->user()->id)->get();
    }

    public function agregarFormulario()
    {
        $this->formularios[] = ['nombre' => '', 'user_id' => auth()->user()->id];
    }

    public function crearMaterias()
    {
        $this->validate([
            'formularios.*.nombre' => 'required|string|max:255',
        ]);

        foreach ($this->formularios as $formulario) {
            Materia::create($formulario);
        }

        $this->formularios = [['nombre' => '', 'user_id' => auth()->user()->id]];
        $this->cargarMaterias();
    }

    public function eliminarMateria($id)
    {
        Materia::destroy($id);
        $this->cargarMaterias();
    }

    public function render()
    {
        return view('livewire.config.crear-materias');
    }

}
