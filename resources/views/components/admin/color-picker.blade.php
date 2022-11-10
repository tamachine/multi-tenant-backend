<div
    x-data="{ color: '{{$model}}' }"
    x-init="
        picker = new Picker($refs.button);
        picker.onDone = rawColor => {
            color = rawColor.hex;
            console.log(rawColor);
            $dispatch('input', color)
        }
    "
    wire:ignore
    {{ $attributes }}
    class="rounded-md shadow-sm border border-gray-300 mt-1 block w-full h-10 flex justify-between"
>
    <div x-text="color" :style="`background: ${color}`" class="py-2 px-4"></div>
    <button x-ref="button" class="py-2 px-4 text-purple-700 hover:underline">
        Change
    </button>
</div>
