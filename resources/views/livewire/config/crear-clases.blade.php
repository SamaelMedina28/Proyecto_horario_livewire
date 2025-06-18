<div>
    <form wire:submit.prevent="crearClases" class="flex flex-col justify-center items-center w-full max-w-2xl bg-white p-4 rounded-lg mx-auto">
        <h1>Clases del dia: {{ ucfirst($diaActual) }}</h1>
        @foreach ($clases as $index => $clase)
            <label class="block">Materia:</label>
            <select wire:model="clases.{{ $index }}.materia_id" class="w-full border rounded">
                <option value="" disabled selected>Selecciona una materia</option>
                @foreach ($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->id }} - {{ $materia->nombre }}</option>
                @endforeach
            </select>
            @error('clases.'.$index.'.materia_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <label class="block">Salon:</label>
            <input type="text" wire:model="clases.{{ $index }}.salon" class="w-full p-2 border rounded">
            @error('clases.'.$index.'.salon')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <label class="block">Edificio:</label>
            <input type="text" wire:model="clases.{{ $index }}.edificio" class="w-full p-2 border rounded">
            @error('clases.'.$index.'.edificio')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <label class="block">Profesor:</label>
            <input type="text" wire:model="clases.{{ $index }}.profesor" class="w-full p-2 border rounded">
            @error('clases.'.$index.'.profesor')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <label class="block">Hora inicio:</label>
            <input type="time" wire:model="clases.{{ $index }}.hora_inicio" class="w-full p-2 border rounded">
            @error('clases.'.$index.'.hora_inicio')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <label class="block">Hora fin:</label>
            <input type="time" wire:model="clases.{{ $index }}.hora_fin" class="w-full p-2 border rounded">
            @error('clases.'.$index.'.hora_fin')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror   
        @endforeach
        
        <button type="button" wire:click="agregarClase" class="bg-green-600 text-xl text-white h-10 w-10 flex items-center justify-center rounded-full 
        transition-all duration-150 ease-in-out 
        hover:bg-green-600 hover:shadow-lg hover:scale-105 
        active:bg-green-700 active:scale-95 active:shadow-inner">
            +
        </button>
        
        <div class="flex justify-end w-full mt-6">
            <x-button type="submit" class="ms-4 bg-green-700 hover:bg-green-800 focus:bg-green-800 active:bg-green-800">
                {{ $mostrarTerminar ? 'Terminar' : 'Siguiente: ' . ucfirst($diaSiguiente) }}
            </x-button>
        </div>
    </form>
</div>