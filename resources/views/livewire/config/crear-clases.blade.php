<div>

    <h1>El dia actual es {{ $diaActual }}</h1>
    @foreach ($materias as $index => $materia)
        <div>
            <label for="clase">Materia:</label>
            <select wire:model="formularios.{{ $index }}.clase">
                <option value="" disabled selected>Selecciona una materia</option>
                @foreach ($materias as $index => $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
        </div>
    @endforeach
    <button class="ms-2 inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-500 active:bg-gray-700 focus:outline-none disabled:opacity-50 transition ease-in-out duration-150 shadow-md active:shadow-none" wire:click="agregarFormulario">Agregar otra</button>
    <x-button class="ms-2" wire:click="siguienteDia">{{ $mostrarTerminar ? 'Terminar' : 'Siguiente: ' . $diaSiguiente }}</x-button>
    {{-- <form wire:submit.prevent="crearClases">
        @foreach ($formularios as $index => $formulario)
            <label for="clase">Materia:</label>
            <select wire:model="formularios.{{ $index }}.clase">
                <option value="" disabled selected>Selecciona una materia</option>
                @foreach ($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
            <x-label for="profesor">Profesor:</x-label>
            <x-input wire:model="formularios.{{ $index }}.profesor" type="text" id="profesor" />
            <x-label for="salon">Salon:</x-label>
            <x-input wire:model="formularios.{{ $index }}.salon" type="text" id="salon" />
            <x-label for="edificio">Edificio:</x-label>
            <x-input wire:model="formularios.{{ $index }}.edificio" type="text" id="edificio" />
            <x-label for="hora_inicio">Hora Inicio:</x-label>
            <x-input wire:model="formularios.{{ $index }}.hora_inicio" type="time" id="hora_inicio" />
            <x-label for="hora_fin">Hora Fin:</x-label>
            <x-input wire:model="formularios.{{ $index }}.hora_fin" type="time" id="hora_fin" />
            @endforeach
        <x-button wire:click="agregarFormulario">Agregar otra</x-button>
        <x-button type="submit">Siguiente</x-button>
    </form> --}}
</div>
