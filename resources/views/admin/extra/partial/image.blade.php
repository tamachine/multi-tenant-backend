<x-admin.form-section submit="uploadImage">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @if ($image)
            <div class="m-4 sm:w-1/2">
                <img src="{{$image->temporaryUrl()}}">
            </div>
        @else
            @if ($image_url != '')
                <div class="m-4 sm:w-1/2">
                    <img src="{{$image_url}}">
                </div>
            @endif
        @endif

        <div class="m-4">
            <x-admin.label for="image" value="Image" />

            <input type="file" class="input-col-md-4"
                name="image" id="image"
                wire:model="image"
            >

            <x-admin.input-error for="image" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
