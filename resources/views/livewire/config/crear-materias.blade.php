<div>
    <form wire:submit.prevent="crearMaterias"
        class="flex flex-col gap-4 justify-center items-center w-full max-w-2xl bg-white p-4 rounded-lg mx-auto">
        @csrf
        <p class="text-center">Ingrese tus materias</p>
        @foreach ($formularios as $index => $formulario)
            <div class="w-full relative">
                <x-label for="formularios.{{ $index }}.nombre" value="Materia {{ $index + 1 }}" />
                <input 
                    type="text" 
                    wire:model="formularios.{{ $index }}.nombre" 
                    placeholder="Ingrese el nombre de la materia" 
                    
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-lime-500 focus:ring focus:ring-lime-100 transition duration-200 outline-none"
                >
                @error('formularios.' . $index . '.nombre')
                    <div class="mt-1 flex items-center text-red-500 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endforeach
        <button type="button" wire:click="agregarFormulario" class="bg-green-600 text-xl text-white h-10 w-10 flex items-center justify-center rounded-full 
        transition-all duration-150 ease-in-out 
        hover:bg-green-600 hover:shadow-lg hover:scale-105 
        active:bg-green-700 active:scale-95 active:shadow-inner">
            +
        </button>
        <div class="flex justify-end w-full mt-6">
            <x-button type="submit" class="ms-4 bg-green-700 hover:bg-green-800 focus:bg-green-800 active:bg-green-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Guardar
            </x-button>
        </div>

    </form>
</div>
