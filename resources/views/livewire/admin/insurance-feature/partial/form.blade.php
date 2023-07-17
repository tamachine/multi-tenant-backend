<x-slot name="form">               
    @foreach(App\Helpers\Language::availableLanguages() as $key => $language)
        <!-- Name -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="name_{{$key}}" value="{{ __('Name') }} - {{$language}}" />
            <x-admin.input id="name_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="name.{{ $key }}" autocomplete="insurance-feature_name" />
            <x-admin.input-error for="name.{{ $key }}" class="mt-2" />
        </div>           

        <!-- Description -->
        <div class="px-4 mt-4">
            <x-admin.label for="description_{{$key}}" value="{{ __('Description') }} - {{$language}}" />
            <x-admin.input id="description_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="description.{{ $key }}" autocomplete="insurance-feature_description" />
            <x-admin.input-error for="description.{{ $key }}" class="mt-2" />
        </div>  

        <hr class="my-8 px-4">
    @endforeach
</x-slot>