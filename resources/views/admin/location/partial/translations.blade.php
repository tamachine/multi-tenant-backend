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
                <x-admin.input id="name_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="names.{{ $key }}" autocomplete="location_name" />
            </div>

            <!-- Pickup Aclaration Notes -->
            <div class="px-4 mt-4">
                <x-admin.label for="pickup_input_infos_{{$key}}" value="{{ __('Pickup Aclaration Notes') }} - {{$language}}" />
                <x-admin.input id="pickup_input_infos_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="pickup_input_infos.{{ $key }}" />
            </div>

            <!-- Dropoff Aclaration Notes -->
            <div class="px-4 mt-4">
                <x-admin.label for="dropoff_input_infos_{{$key}}" value="{{ __('Dropoff Aclaration Notes') }} - {{$language}}" />
                <x-admin.input id="dropoff_input_infos_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="dropoff_input_infos.{{ $key }}" />
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
