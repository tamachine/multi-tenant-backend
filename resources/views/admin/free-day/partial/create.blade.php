<x-admin.form-section submit="saveFreeDay">
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
            <x-admin.input id="name" type="text" class="mt-1 block" maxlength="255" wire:model.defer="name" autocomplete="free_day_name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        <!-- Minimum days -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="min_days" value="{{ __('Minimum Days') }}" />
            <x-admin.input id="min_days" type="number" class="w-20 mt-1 block" min="1" wire:model.defer="min_days" />
            <x-admin.input-error for="min_days" class="mt-2" />
        </div>

        <!-- Maximum days -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="max_days" value="{{ __('Minimum Days') }}" />
            <x-admin.input id="max_days" type="number" class="w-20 mt-1 block" min="1" wire:model.defer="max_days" />
            <x-admin.input-error for="max_days" class="mt-2" />
        </div>

        <!-- Free days -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="days_for_free" value="{{ __('Free Days') }}" />
            <x-admin.input id="days_for_free" type="number" class="w-20 mt-1 block" min="1" wire:model.defer="days_for_free" />
            <x-admin.input-error for="days_for_free" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
