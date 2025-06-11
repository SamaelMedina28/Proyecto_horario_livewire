<div>
    <form wire:submit.prevent="crearMaterias" class="flex flex-col gap-4 justify-center items-center w-1/2 bg-white p-4 rounded-lg shadow mx-auto">
        @csrf
        
        @foreach ($formularios as $index => $formulario)
        <div class="mb-4">
            <input type="text" wire:model="formularios.{{ $index }}.nombre" 
                   placeholder="Nombre" required 
                   class="border rounded px-3 py-2">
                   
            <input type="text" wire:model="formularios.{{ $index }}.codigo" 
                   placeholder="Código" required 
                   class="border rounded px-3 py-2 ml-2">
        </div>
        @endforeach
        
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Guardar Materias
        </button>
        
        <button type="button" wire:click="agregarFormulario" 
                class="bg-gray-500 text-white px-4 py-2 rounded ml-2">
            + Agregar otro
        </button>
    </form>

    <div class="mt-8 flex justify-between flex-col text-center bg-white p-4 w-1/2 mx-auto rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Materias registradas:</h3>
        <ul class="list-disc list-inside">
            @foreach ($materias as $materia)
                <li class="mb-1">
                    <span class="font-medium">{{ $materia->codigo }}</span> - {{ $materia->nombre }}
                    <button wire:click="eliminarMateria({{ $materia->id }})" class="ml-2 text-red-500">Eliminar</button>
                </li>
            @endforeach
        </ul>
    </div>
</div>