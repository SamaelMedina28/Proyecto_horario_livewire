<div>
    <h1>El dia actual es {{ ucfirst($diaActual) }}</h1>
    <form wire:submit.prevent="crearClases">
        @foreach ($clases as $index => $clase)
            <div class="mb-4 p-4 border rounded">
                <label class="block mb-2">Materia:</label>
                <select wire:model="clases.{{ $index }}.materia_id" class="w-full p-2 border rounded">
                    <option value="" disabled selected>Selecciona una materia</option>
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->id }} - {{ $materia->nombre }}</option>
                    @endforeach
                </select>
                @error('clases.'.$index.'.materia_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <label class="block mb-2 mt-2">Salon:</label>
                <input type="text" wire:model="clases.{{ $index }}.salon" class="w-full p-2 border rounded">
                @error('clases.'.$index.'.salon')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <label class="block mb-2 mt-2">Edificio:</label>
                <input type="text" wire:model="clases.{{ $index }}.edificio" class="w-full p-2 border rounded">
                @error('clases.'.$index.'.edificio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <label class="block mb-2 mt-2">Profesor:</label>
                <input type="text" wire:model="clases.{{ $index }}.profesor" class="w-full p-2 border rounded">
                @error('clases.'.$index.'.profesor')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <label class="block mb-2 mt-2">Hora inicio:</label>
                <input type="time" wire:model="clases.{{ $index }}.hora_inicio" class="w-full p-2 border rounded">
                @error('clases.'.$index.'.hora_inicio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <label class="block mb-2 mt-2">Hora fin:</label>
                <input type="time" wire:model="clases.{{ $index }}.hora_fin" class="w-full p-2 border rounded">
                @error('clases.'.$index.'.hora_fin')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        @endforeach
        
        <x-button type="button" wire:click="agregarClase" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Agregar Clase
        </x-button>
        
        <x-button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">
            {{ $mostrarTerminar ? 'Terminar' : 'Siguiente: ' . ucfirst($diaSiguiente) }}
        </x-button>
    </form>
</div>