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

        <!-- Slug -->
        <div class="px-4 mt-4">
            <x-admin.label for="slug" value="{{ __('Slug/URL') }}" />
            <x-admin.input id="slug" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="slug" autocomplete="author_slug" />
            <x-admin.input-error for="slug" class="mt-2" />
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

        <!-- Short Bio -->
        <div class="px-4 mt-4">
            <x-admin.label for="short_bio" value="Short Bio" />
            <textarea id="short_bio" class="mt-1 focus:ring-purple-700 focus:purple-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400"
                wire:model.defer="short_bio" rows="3" autocomplete="short_bio">
            </textarea>
        </div>

        <!-- Bio -->
        <div class="px-4 mt-4">
            <x-admin.label for="bio" value="{{ __('Bio') }}" />
            <x-admin.tinymce-editor wire:model="bio" placeholder="Write a nice author bio..." />
        </div>

        <hr class="my-4">       

        <div class="m-4">
            <livewire:common.featured-image-upload text="Upload photo" :model="$author" :wire:key="$author->hashid" />
        </div>        
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
