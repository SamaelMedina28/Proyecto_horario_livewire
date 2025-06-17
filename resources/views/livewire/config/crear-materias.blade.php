<div>
    <form wire:submit.prevent="crearMaterias" class="flex flex-col gap-4 justify-center items-center w-1/2 bg-white p-4 rounded-lg mx-auto">
        @csrf
        
        @foreach ($formularios as $index => $formulario)
        <div class="mb-4">
            <input type="text" wire:model="formularios.{{ $index }}.nombre" 
                   placeholder="Nombre" required 
                   class="border rounded px-3 py-2">
        </div>
        @endforeach
        
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Guardar Materias
        </button>
        
        <button type="button" wire:click="agregarFormulario" 
                class="bg-gray-500 text-white px-4 py-2 rounded ml-2">
            + Agregar otra
        </button>
    </form>
</div>