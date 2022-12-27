<x-admin.form-section submit="uploadPdf">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @if ($path != '')
            <div class="m-4 sm:w-1/2">
                <embed src="{{$path}}" width="320px" height="500px">
            </div>
        @endif

        <div class="m-4">
            <x-admin.label for="pdf" value="Upload new PDF" />

            <input type="file" class="input-col-md-4"
                name="pdf" id="pdf"
                wire:model="pdf"
            >

            <x-admin.input-error for="pdf" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
