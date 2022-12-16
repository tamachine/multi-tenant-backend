<x-admin.form-section submit="editAffiliate">
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
            <x-admin.input id="name" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="name" autocomplete="affiliate_name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="username" value="{{ __('Username') }}" />
            <x-admin.input id="username" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="username" autocomplete="affiliate_username" />
            <x-admin.input-error for="username" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="email" value="{{ __('Email (optional)') }}" />
            <x-admin.input id="email" type="email" class="mt-1 block w-full" maxlength="255" wire:model.defer="email" autocomplete="affiliate_name" />
            <x-admin.input-error for="email" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label-tooltip for="password" value="{{ __('Password') }}" tooltip="You can't see the current password for safety reasons but you can change it for the affilieate" />
            <x-admin.input id="password" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="password" autocomplete="affiliate_password" />
            <x-admin.input-error for="password" class="mt-2" />
        </div>

        <!-- Commission percentage -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="commission_percentage" value="{{ __('Commission percentage') }}" />
            <x-admin.input id="commission_percentage" type="number" class="w-20 mt-1 block" min="1" max="50" wire:model.defer="commission_percentage" />
            <x-admin.input-error for="commission_percentage" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
