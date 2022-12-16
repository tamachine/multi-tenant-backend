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
                <x-admin.label for="name_{{$key}}" value="{{ __('Name') }} - {{$language}}" />
                <x-admin.input id="name_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="names.{{ $key }}" autocomplete="extra_name" />
            </div>

            <!-- Description -->
            <div class="px-4 mt-4">
                <x-admin.label for="description_{{$key}}" value="{{ __('Description') }} - {{$language}}" />
                <textarea id="description_{{$key}}" class="mt-1 focus:ring-purple-700 focus:purple-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400"
                    wire:model.defer="descriptions.{{ $key }}" rows="3" autocomplete="extra_description">
                </textarea>
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
