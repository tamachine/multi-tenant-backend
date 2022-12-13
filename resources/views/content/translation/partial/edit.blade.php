<x-admin.form-section submit="update" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @foreach(config('languages') as $key => $language)
            <!-- Text -->
            <div class="px-4 mt-4">
                <x-admin.label for="text_{{$key}}" value="{{ __('Text') }} - {{$language}}" />
                <x-admin.input id="text_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="text.{{ $key }}" autocomplete="translation_text" />
                <x-admin.input-error for="text.{{ $key }}" class="mt-2" />
            </div>           
            <hr class="my-8 px-4">
        @endforeach
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
