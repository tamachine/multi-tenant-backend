{{-- desktop btn --}}
@if($extra->included)
    <div
        class="md-max:hidden rounded-lg text-white font-sans-medium py-[6px] text-lg bg-pink-red px-4"
    >
        <div class="flex items-center justify-center gap-3">
            <div>{!! __('extras.included') !!}</div>
            <div class="flex items-center">
                <img class="inline border rounded-full bg-white w-[18px] h-[18px]" src="{{ asset('images/icons/check-circle.svg') }}" />
            </div>
        </div>
    </div>
@else
    <button
        x-on:click="toggle"
        wire:click="toggleExtra('{{ $extra->hashid }}')"
        class="md-max:hidden rounded-lg text-white font-sans-medium py-[6px] text-lg"
        :class="selected ? 'bg-pink-red px-4' : 'bg-black px-7'"
    >
        <div class="flex items-center justify-center gap-3">
            <div x-text="selected ? '{!! __('extras.selected') !!}' : '{!! __('extras.select') !!}'"></div>
            <div
                x-cloak
                x-show="selected"
                class="flex items-center"
            >
                <img class="inline border rounded-full bg-white w-[18px] h-[18px]" src="{{ asset('images/icons/check-circle.svg') }}" />
            </div>
        </div>
    </button>
@endif

{{-- mobile btn --}}
<button
    x-on:click="toggle"
    class="md:hidden border-2 border-pink-red w-10 h-10 rounded-full flex items-center"
>
    <div
        class="rounded-full"
        x-cloak
        x-show="selected"
    >
        <img class="rounded-full w-10 h-10" src="{{ asset('images/icons/check-circle.svg') }}" />
    </div>
</button>
