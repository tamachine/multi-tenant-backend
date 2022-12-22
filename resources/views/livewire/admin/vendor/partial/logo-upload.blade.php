<x-admin.form-section submit="uploadLogo">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @if ($logo)
            <div class="m-4 sm:w-1/2">
                <img src="{{$logo->temporaryUrl()}}">
            </div>
        @else
            @if ($logo_url != '')
                <div class="m-4 sm:w-1/2">
                    <img src="{{$logo_url}}">
                </div>
            @endif
        @endif

        <div class="m-4">
            <x-admin.label for="logo" value="Logo" />

            <input type="file" class="input-col-md-4"
                name="logo" id="logo"
                wire:model="logo"
            >

            <x-admin.input-error for="logo" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
