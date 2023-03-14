<x-admin.form-section submit="saveRate">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Code -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="code" value="{{ __('Code') }}" />
            <x-admin.input id="code" type="text" class="mt-1 block w-20" maxlength="3" wire:model.defer="code" />
            <x-admin.input-error for="code" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="name" value="{{ __('Name') }}" />
            <x-admin.input id="name" type="text" class="mt-1 block w-full" maxlength="80" wire:model.defer="name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        <!-- Value -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="value" value="{{ __('Value') }}" />
            <x-admin.input id="value" type="number" class="mt-1 block w-full" step="any" wire:model.defer="value" />
            <x-admin.input-error for="value" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
