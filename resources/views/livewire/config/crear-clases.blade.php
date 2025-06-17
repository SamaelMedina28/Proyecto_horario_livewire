<div>

    <h1>El dia actual es {{ $diaActual }}</h1>
    <form wire:submit.prevent="crearClases">
        <div>
            <label>Materia:</label>
            <select wire:model="materia">
                <option value="">Selecciona una materia</option>
                @foreach ($materias as $index => $materia)
                    <option value="{{ $materia->id }}">{{$materia->id . ' - ' . $materia->nombre }}</option>
                @endforeach
            </select>
            @error('materia')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <input type="text" wire:model="salon" placeholder="Salon">
            @error('salon')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <input type="text" wire:model="edificio" placeholder="Edificio">
            @error('edificio')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <input type="text" wire:model="profesor" placeholder="Profesor">
            @error('profesor')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <input type="time" wire:model="hora_inicio" placeholder="Hora inicio">
            @error('hora_inicio')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <input type="time" wire:model="hora_fin" placeholder="Hora fin">
            @error('hora_fin')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        {{-- <x-button type="button" wire:click="agregarFormulario">Agregar otra</x-button> --}}
        <x-button class="ms-2" type="submit">{{ $mostrarTerminar ? 'Terminar' : 'Siguiente: ' . $diaSiguiente }}</x-button>
    </form>
</div>
