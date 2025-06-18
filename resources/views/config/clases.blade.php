<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuración de Clases') }}
        </h2>
    </x-slot>

    <div>
        @livewire('config.crear-clases', ['dia' => $dia, 'materias' => $materias])
    </div>
</x-app-layout>