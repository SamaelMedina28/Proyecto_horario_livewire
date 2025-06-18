<div>
    <form wire:submit.prevent="crearClases"
        class="flex flex-col justify-center items-center w-full max-w-2xl bg-white p-4 rounded-lg mx-auto">
        <h1 class="text-lg font-medium text-gray-800 mb-6 text-center">
            <span class="text-lime-500">Clases del día:</span> {{ ucfirst($diaActual) }}
        </h1>
        @foreach ($clases as $index => $clase)
            <div class="relative my-4">
                <div class="relative flex justify-center">
                    <span class="bg-white px-2 text-xs text-lime-500">Clase {{ $index + 1 }}</span>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-x-4 gap-y-2 mb-6" wire:key="clase-formulario-{{ $index }}">
                <div>
                    <label class="text-sm font-semibold text-gray-700">Materia:</label>
                    <select wire:model="clases.{{ $index }}.materia_id"
                        class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:border-lime-500 focus:ring-lime-500">
                        <option value="" disabled selected>Selecciona una materia</option>
                        @foreach ($materias as $materia)
                            <option value="{{ $materia->id }}">{{ $materia->id }} - {{ $materia->nombre }}</option>
                        @endforeach
                    </select>
                    @error('clases.' . $index . '.materia_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="text-sm font-semibold text-gray-700">Profesor:</label>
                    <input type="text" wire:model="clases.{{ $index }}.profesor"
                        class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:border-lime-500 focus:ring-lime-500">
                    @error('clases.' . $index . '.profesor')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="text-sm font-semibold text-gray-700">Salón:</label>
                    <input type="text" wire:model="clases.{{ $index }}.salon"
                        class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:border-lime-500 focus:ring-lime-500">
                    @error('clases.' . $index . '.salon')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="text-sm font-semibold text-gray-700">Edificio:</label>
                    <input type="text" wire:model="clases.{{ $index }}.edificio"
                        class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:border-lime-500 focus:ring-lime-500 uppercase">
                    @error('clases.' . $index . '.edificio')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="text-sm font-semibold text-gray-700">Hora inicio:</label>
                    <input type="time" wire:model="clases.{{ $index }}.hora_inicio"
                        class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:border-lime-500 focus:ring-lime-500">
                    @error('clases.' . $index . '.hora_inicio')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="text-sm font-semibold text-gray-700">Hora fin:</label>
                    <input type="time" wire:model="clases.{{ $index }}.hora_fin"
                        class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:border-lime-500 focus:ring-lime-500">
                    @error('clases.' . $index . '.hora_fin')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endforeach


        <button type="button" wire:click="agregarClase"
            class="bg-green-600 text-xl text-white h-10 w-10 flex items-center justify-center rounded-full 
        transition-all duration-150 ease-in-out 
        hover:bg-green-600 hover:shadow-lg hover:scale-105 
        active:bg-green-700 active:scale-95 active:shadow-inner">
            +
        </button>

        <div class="flex justify-end w-full mt-6">
            <x-button type="submit"
                class="ms-4 bg-green-700 hover:bg-green-800 focus:bg-green-800 active:bg-green-800">
                {{ $mostrarTerminar ? 'Terminar' : 'Siguiente' }}
            </x-button>
        </div>
    </form>
</div>
