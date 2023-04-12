<x-admin.form-section submit="saveTranslations" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @foreach(App\Helpers\Language::availableLanguages() as $key => $language)
            <!-- Name -->
            <div class="px-4 mt-4">
                <x-admin.label for="name_{{$key}}" value="{{ 'Name' }} - {{$language}}" />
                <x-admin.input id="name_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="names.{{ $key }}" autocomplete="category_name" />
            </div>

            <!-- Slug -->
            <div class="px-4 mt-4">
                <x-admin.label for="slug_{{$key}}" value="{{ 'Slug' }} - {{$language}}" />
                <x-admin.input id="slug_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="slugs.{{ $key }}" autocomplete="category_slug" />
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
