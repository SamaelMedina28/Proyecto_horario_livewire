<div>
    
    <h1>Crear Clases para el dia {{ $dia }}</h1>

    <form wire:submit.prevent="crearClases">
        <label for="clase">Materia:</label>
        <select wire:model="clase">
            <option value="" disabled selected>Selecciona una materia</option>
            @foreach ($materias as $materia)
                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
            @endforeach
        </select>
        <x-label for="profesor">Profesor:</x-label>
        <x-input wire:model="profesor" type="text" id="profesor" />
        <x-label for="salon">Salon:</x-label>
        <x-input wire:model="salon" type="text" id="salon" />
        <x-label for="edificio">Edificio:</x-label>
        <x-input wire:model="edificio" type="text" id="edificio" />
        <x-label for="hora">Hora Inicio:</x-label>
        <x-input wire:model="hora" type="time" id="hora" />
        <x-label for="hora">Hora Fin:</x-label>
        <x-input wire:model="hora" type="time" id="hora" />
        <x-button type="submit">Siguiente</x-button>
    </form>
</div>
