<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    
    <div class="py-12 bg-lime-500">
        @livewire('create-form') 
        {{-- @livewire('dia-prueba', ['dia' => $dia]) --}}
    </div>
</x-app-layout>
