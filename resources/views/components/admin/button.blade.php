<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-4 bg-purple-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-purple-700 hover:text-purple-700 active:bg-white active:border-purple-700 active:text-purple-700  disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
