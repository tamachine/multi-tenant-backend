<x-admin.form-section submit="saveCategory">
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
            <x-admin.input id="name" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="name" autocomplete="category_name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        <!-- Slug -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="slug" value="{{ __('Slug/URL') }}" />
            <x-admin.input id="slug" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="slug" autocomplete="acategory_slug" />
            <x-admin.input-error for="slug" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
