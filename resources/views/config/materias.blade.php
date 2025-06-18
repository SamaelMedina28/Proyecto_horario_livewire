<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Agregar Materias') }}
        </h2>
    </x-slot>

    <div>
        @livewire('config.crear-materias')
    </div>
</x-app-layout>