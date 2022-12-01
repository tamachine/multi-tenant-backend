<x-admin.form-section submit="saveUser">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="name" value="{{ __('Name') }}" />
            <x-admin.input id="name" type="text" class="mt-1 w-full" maxlength="255" wire:model.defer="name" autocomplete="name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="email" value="{{ __('Email') }}" />
            <x-admin.input id="email" type="email" class="mt-1 w-full" maxlength="255" wire:model.defer="email" autocomplete="email" />
            <x-admin.input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
