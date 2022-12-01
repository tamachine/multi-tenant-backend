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

         <!-- Role -->
         <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="role" value="{{ __('Role') }}" />
            <select id="role" name="role" wire:model="role"
                class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
            >
                @foreach(config('roles.intranet_roles') as $key => $value)
                    <option value="{{$key}}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <!-- Blogger -->
        <div class="px-4 mt-4">
            <x-admin.label for="blogger" value="{{ __('Blogger') }}" />

            <label for="blogger" class="inline-flex items-center">
                <x-admin.checkbox id="blogger" wire:model="blogger" class="w-10 h-10 mt-1" />
            </label>
        </div>

        <!-- Send welcome email -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="welcome" value="{{ __('Send welcome email') }}" />

            <label for="welcome" class="inline-flex items-center">
                <x-admin.checkbox id="welcome" wire:model="welcome" class="w-10 h-10 mt-1" />
            </label>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
