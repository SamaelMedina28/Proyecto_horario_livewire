<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $clase[0]->dia }}
        </h2>
    </x-slot>
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow flex flex-col gap-2 py-6 max-w-2xl mx-auto">
        @foreach ($clase as $clase)
            <strong>Materia:</strong>
            <p>{{ $clase->materia->nombre }}</p>
            <strong>Profesor:</strong>
            <p>{{ $clase->profesor }}</p>
            <div class="grid grid-cols-2 gap-2">
                <strong>Salon:</strong>
                <strong>Edificio:</strong>
                <p>{{ $clase->salon }}</p>
                <p>{{ $clase->edificio }}</p>
                <strong>Hora inicio:</strong>
                <strong>Hora fin:</strong>
                <p>{{ $clase->hora_inicio }}</p>
                <p>{{ $clase->hora_fin }}</p>
            </div>
        @endforeach
    </div>
    <div class="w-full flex justify-center mt-8 mb-8">
        <a href="{{ route('welcome') }}" 
           class="inline-flex items-center justify-center w-12 h-12 bg-green-600 hover:bg-green-700 text-white rounded-full transition-all duration-200 ease-in-out transform hover:scale-105"
           title="Volver al inicio">
            <i class="fa-solid fa-angle-left"></i>
        </a>
    </div>
</x-app-layout>