<div
    x-data="{ color: '{{$model}}' }"
    x-ref="colorr"
    x-init="
        picker = new Picker({
            parent: $refs.colorr,
            popup: 'bottom'
        });
        picker.onDone = rawColor => {
            color = rawColor.hex;
            $dispatch('input', color)
        }
    "
    wire:ignore
    {{ $attributes }}
    class="rounded-md shadow-sm border border-gray-300 mt-1 block w-full h-10 flex justify-between cursor-pointer"
>
    <div x-text="color" :style="`background: ${color}`" class="py-2 px-4 text-shadow"></div>
</div>
