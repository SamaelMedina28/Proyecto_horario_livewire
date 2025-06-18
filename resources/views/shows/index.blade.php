<x-app-layout>
    <style>
        .slider-outer {
            max-width: 42rem;
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

    <div class="py-6 select-none">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="slider-outer">
                <div id="slider" class="slider-container h-[calc(80vh-4rem)]">
                    @foreach ($dias as $dia)
                        <div class="slide {{ $dia === $diaActual ? 'active' : '' }}" data-dia="{{ $dia }}">
                            <div class="space-y-6">
                                <div class="flex justify-center">
                                    <h3 class="text-xl font-semibold text-center text-gray-800 border-2 border-gray-900 py-2 px-4 transition-colors duration-300">
                                        {{ ucfirst($dia) }}
                                    </h3>
                                </div>

                                @php
                                    $clasesDia = $clases->filter(fn($c) => strtolower($c->dia) === $dia);
                                @endphp

                                @if ($clasesDia->isEmpty())
                                    <div class="text-center text-gray-500">
                                        No hay clases programadas para este día
                                    </div>
                                @else
                                    @foreach ($clasesDia as $clase)
                                        <a href="{{ route('clases.show', $clase->id) }}"
                                            class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow flex flex-col gap-2">
                                            <p class="font-medium text-gray-900 text-center">
                                                {{ $clase->materia->nombre }}</p>
                                            <div class="text-sm text-center text-gray-800">
                                                {{ $clase->hora_inicio }} - {{ $clase->hora_fin }}
                                            </div>
                                        </a>
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
            const diaActual = "{{ $diaActual }}";
            const slider = document.getElementById("slider");
            const slides = slider.querySelectorAll(".slide");
            const outer = slider.parentElement;

            console.log('Día actual:', diaActual); // Para debugging

            // Función para centrar el slide
            function centerSlide(targetSlide) {
                const slideWidth = targetSlide.offsetWidth;
                const containerWidth = outer.offsetWidth;
                const slideOffset = targetSlide.offsetLeft;
                
                // Calcular la posición para centrar el slide
                const scrollPosition = slideOffset - (containerWidth / 2) + (slideWidth / 2);
                
                // Usar setTimeout para asegurar que el DOM esté completamente cargado
                setTimeout(() => {
                    slider.scrollTo({
                        left: Math.max(0, scrollPosition),
                        // behavior: 'smooth'
                    });
                }, 100);
            }

            // Buscar y centrar el día actual
            let slideEncontrado = false;
            slides.forEach(slide => {
                if (slide.dataset.dia === diaActual) {
                    centerSlide(slide);
                    slideEncontrado = true;
                }
            });

            // Si no se encuentra el día actual, centrar en el primer slide
            if (!slideEncontrado && slides.length > 0) {
                centerSlide(slides[0]);
            }

            // Funcionalidad de arrastrar con mouse
            let isDown = false;
            let startX, scrollLeft;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.style.cursor = 'grabbing';
                startX = e.pageX - slider.getBoundingClientRect().left;
                scrollLeft = slider.scrollLeft;
                e.preventDefault();
            });

            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.style.cursor = 'grab';
            });

            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.style.cursor = 'grab';
            });

            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.getBoundingClientRect().left;
                const walk = (x - startX) * 2;
                slider.scrollLeft = scrollLeft - walk;
            });

            // Agregar cursor pointer por defecto
            slider.style.cursor = 'grab';

            // Opcional: Actualizar el slide activo basado en el scroll
            slider.addEventListener('scroll', () => {
                const containerCenter = slider.scrollLeft + slider.offsetWidth / 2;
                
                slides.forEach(slide => {
                    const slideStart = slide.offsetLeft;
                    const slideEnd = slideStart + slide.offsetWidth;
                    
                    if (containerCenter >= slideStart && containerCenter <= slideEnd) {
                        // Remover clase active de todos los slides
                        slides.forEach(s => s.classList.remove('active'));
                        // Agregar clase active al slide actual
                        slide.classList.add('active');
                    }
                });
            });
        });
    </script>
</x-app-layout>