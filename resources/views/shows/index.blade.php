<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Horario de Clases
        </h2>
    </x-slot>

    @php
        $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
    @endphp

    <style>
        .slider-container {
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            overflow-x: auto;
            display: flex;
            scroll-behavior: smooth;
        }

        .slide {
            scroll-snap-align: center;
            flex: 0 0 100%;
            padding: 1.5rem;
            box-sizing: border-box;
        }

        .slider-container::-webkit-scrollbar {
            display: none;
        }
    </style>

    <div class="py-6 select-none touch-callout-none user-select-none">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div id="slider" class="slider-container">
                @foreach ($dias as $dia)
                    <div class="slide" data-dia="{{ $dia }}" wire:key="{{ $dia }}">
                        <div class="space-y-6">
                            <h3 class="text-2xl font-semibold text-center text-gray-800">
                                {{ ucfirst($dia) }}
                            </h3>

                            @php
                                $clasesDia = $clases->filter(fn($c) => strtolower($c->dia) === $dia);
                            @endphp

                            @if ($clasesDia->isEmpty())
                                <div class="text-center text-gray-500">
                                    No hay clases programadas para este día
                                </div>
                            @else
                                @foreach ($clasesDia as $clase)
                                    <div
                                        class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow flex flex-col gap-2">
                                        <p class="font-medium text-gray-900 text-center">{{ $clase->materia->nombre }}
                                        </p>
                                        <div class="text-sm text-center text-gray-800">
                                            {{ $clase->hora_inicio }} - {{ $clase->hora_fin }}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const diaActual = "{{ strtolower($diaActual) }}"; 
    console.log('Día desde PHP:', diaActual);
    
    const slider = document.getElementById("slider");
    const slides = slider.querySelectorAll(".slide");
    
    // Verificar coincidencias exactas
    for (let slide of slides) {
        console.log('Día en slide:', slide.dataset.dia);
        if (slide.dataset.dia === diaActual) {
            console.log('Coincidencia encontrada');
            slider.scrollLeft = slide.offsetLeft - (slider.offsetWidth / 2) + (slide.offsetWidth / 2);
            break;
        }
    }

            // Arrastrar con mouse
            let isDown = false;
            let startX, scrollLeft;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('cursor-grabbing');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });

            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.classList.remove('cursor-grabbing');
            });

            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.classList.remove('cursor-grabbing');
            });

            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (startX - x);
                slider.scrollLeft = scrollLeft + walk;
            });
        });
    </script>

</x-app-layout>
