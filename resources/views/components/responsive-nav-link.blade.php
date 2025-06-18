@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-lime-400 text-start text-base font-medium text-white bg-lime-500 focus:outline-none focus:text-indigo-800 focus:bg-lime-500 focus:border-lime-400 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 borer-l-4 border-transparent text-start text-base font-medium text-white hover:bg-lime-500 hover:border-lime-400 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-lime-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
