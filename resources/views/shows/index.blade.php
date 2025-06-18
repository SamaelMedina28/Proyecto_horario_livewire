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
        .slider-outer {
            max-width: 42rem; /* max-w-2xl */
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            position: relative;
        }
        .slider-container {
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            overflow-x: auto;
            display: flex;
            scroll-behavior: smooth;
            width: 100%;
        }
        .slide {
            scroll-snap-align: center;
            flex: 0 0 100%;
            padding: 1.5rem;
            box-sizing: border-box;
            min-width: 100%;
        }
        .slider-container::-webkit-scrollbar {
            display: none;
        }
    </style>

    <div class="py-6 select-none touch-callout-none user-select-none">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="slider-outer"> <!-- Nuevo contenedor externo -->
                <div id="slider" class="slider-container">
                    @foreach ($dias as $dia)
                        <div class="slide" data-dia="{{ $dia }}" wire:key="{{ $dia }}">
                            <!-- Contenido del slide igual que antes -->
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
                                        <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow flex flex-col gap-2">
                                            <p class="font-medium text-gray-900 text-center">{{ $clase->materia->nombre }}</p>
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
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const diaActual = "{{ strtolower($diaActual) }}";
            const slider = document.getElementById("slider");
            const slides = slider.querySelectorAll(".slide");
            const outer = slider.parentElement;

            // Función para centrar correctamente considerando el contenedor limitado
            function centerSlide(slide) {
                const outerRect = outer.getBoundingClientRect();
                const slideRect = slide.getBoundingClientRect();
                const scrollPosition = slide.offsetLeft - (outerRect.width / 2) + (slideRect.width / 2);
                
                slider.scrollTo({
                    left: scrollPosition,
                    behavior: 'auto'
                });
            }

            // Centrar el día actual al cargar
            for (let slide of slides) {
                if (slide.dataset.dia === diaActual) {
                    centerSlide(slide);
                    break;
                }
            }

            // Arrastrar con mouse (ajustado para el contenedor limitado)
            let isDown = false;
            let startX, scrollLeft;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('cursor-grabbing');
                startX = e.pageX - slider.getBoundingClientRect().left;
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
                const x = e.pageX - slider.getBoundingClientRect().left;
                const walk = (x - startX) * 2; // Aumentamos la sensibilidad
                slider.scrollLeft = scrollLeft - walk;
            });
        });
    </script>
</x-app-layout>