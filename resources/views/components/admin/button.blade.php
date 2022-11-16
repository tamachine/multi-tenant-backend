<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-green-700 hover:text-green-700 active:bg-white active:border-green-700 active:text-green-700']) }}>
    {{ $slot }}
</button>
