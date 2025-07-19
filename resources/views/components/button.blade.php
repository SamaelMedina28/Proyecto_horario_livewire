<button {{ $attributes->merge(['type' => 'submit', 'class' => 'ms-2 inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:bg-green-800 active:bg-green-800 focus:outline-none disabled:opacity-50 transition ease-in-out duration-150 shadow-md active:shadow-none']) }}>
    {{ $slot }}
</button>