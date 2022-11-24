@props(['value', 'tooltip'])

<div class="flex">
    <label {{ $attributes->merge(['class' => 'block font-semibold text-sm text-gray-700']) }}>
        {{ $value ?? $slot }}
    </label>

    <div x-data="{ tooltip: false }" class="relative z-30 inline-flex">
        <div x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false" class="ml-1 text-blue-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
            </svg>
        </div>

        <div class="relative" x-cloak x-show.transition.origin.top="tooltip">
            <div class="absolute top-0 z-10 w-64 p-2 -mt-1 text-sm leading-tight text-white transform -translate-x-1/2 -translate-y-full bg-blue-500 rounded-lg shadow-lg">
                {{ $tooltip ?? $slot }}
            </div>
            <svg class="absolute left-2 z-10 w-6 h-6 text-blue-500 transform -translate-x-12 -translate-y-3 fill-current stroke-current" width="8" height="8">
                <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
            </svg>
        </div>
    </div>
</div>
