<x-admin.form-section submit="saveAuthor" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="px-4">
            <x-admin.label for="name" value="{{ __('Name') }}" />
            <x-admin.input id="name" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="name" autocomplete="author_name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        <!-- Meta title -->
        <div class="px-4 mt-4">
            <x-admin.label for="meta_title" value="{{ __('Meta title') }}" />
            <x-admin.input id="meta_title" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="meta_title" autocomplete="author_meta_title" />
            <x-admin.input-error for="meta_title" class="mt-2" />
        </div>

        <!-- Meta description -->
        <div class="px-4 mt-4">
            <x-admin.label for="meta_description" value="{{ __('Meta description') }}" />
            <x-admin.input id="meta_description" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="meta_description" autocomplete="author_meta_description" />
            <x-admin.input-error for="meta_description" class="mt-2" />
        </div>

        <!-- Bio -->
        <div class="px-4 mt-4">
            <x-admin.label for="bio" value="{{ __('Bio') }}" />
            <x-admin.tinymce-editor wire:model="bio" placeholder="Write a nice author bio..." />
        </div>

        <!-- Photo -->
        @if ($photo)
            <div class="m-4 sm:w-1/2">
                <img src="{{$photo->temporaryUrl()}}">
            </div>
        @else
            @if ($photo_url != '')
                <div class="m-4 sm:w-1/2">
                    <x-admin.label for="current_photo" value="{{ __('Current Photo') }}" />
                    <img src="{{$photo_url}}">
                </div>
            @endif
        @endif

        <div class="m-4">
            <x-admin.label for="photo" value="{{ __('Upload Photo') }}" />

            <input type="file" class="mt-2"
                name="photo" id="photo"
                wire:model="photo"
            >

            <x-admin.input-error for="photo" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
