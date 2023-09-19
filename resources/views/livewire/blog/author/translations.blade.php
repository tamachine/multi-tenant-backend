<x-admin.form-section submit="saveTranslations" formClass="block">
    <x-slot name="title">
        {{ __('Edit Translations') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Edit the author\'s bios and short_bio in other languages') }}
    </x-slot>

    <x-slot name="form">
        @foreach(App\Helpers\Language::availableLanguages() as $key => $language)
            <!-- short_bio -->
            <div class="px-4 mt-4">
                <x-admin.label for="short_bio_{{$key}}" value="{{ 'Short bio' }} - {{$language}}" />
                <x-admin.input id="short_bio_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="short_bios.{{ $key }}" autocomplete="short_bio" />
            </div>           
            
            <!-- Bio -->             
            <div class="px-4 mt-4">
                <x-admin.label for="bio_{{$key}}" value="{{ __('Bio') }} - {{$language}}" />
                <x-admin.tinymce-editor id="bio_{{$key}}" wire:model.defer="bios.{{ $key }}" rows="3" autocomplete="bio" height="400px" />
            </div>

            <hr class="my-8 px-4">
        @endforeach

    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ __('Save Translations') }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
