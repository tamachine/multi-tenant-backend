<x-admin.form-section submit="saveLocation" formClass="block">
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
            <x-admin.input id="name" type="text" class="mt-1 block" maxlength="255" wire:model.defer="name" autocomplete="location_name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        {{-- Pickup Input extra --}}
        <h3 class="font-xl font-bold mt-10 mx-4 border-b border-gray-500">Pickup Input extra</h3>

        <div class="mt-4 w-full md:flex md:space-between">
            <div class="flex md:w-1/3">
                <!-- Show Input -->
                <div class="px-4 mt-4 md:mt-0 w-1/2">
                    <x-admin.label for="pickup_show_input" value="{{ __('Show Input') }}" />
                    <select id="pickup_show_input" name="pickup_show_input" wire:model="pickup_show_input"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="1">{{ __('Yes') }}</option>
                        <option value="0">{{ __('No') }}</option>
                    </select>
                    <x-admin.input-error for="pickup_show_input" class="mt-2" />
                </div>

                <!-- Filling Require -->
                <div class="px-4 mt-4 md:mt-0 w-1/2">
                    <x-admin.label for="pickup_input_require" value="{{ __('Filling Require') }}" />
                    <select id="pickup_input_require" name="pickup_input_require" wire:model="pickup_input_require"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="1">{{ __('Yes') }}</option>
                        <option value="0">{{ __('No') }}</option>
                    </select>
                    <x-admin.input-error for="pickup_input_require" class="mt-2" />
                </div>
            </div>

             <!-- Aclaration Notes -->
            <div class="px-4 mt-4 md:mt-0 md:w-2/3">
                <x-admin.label for="pickup_input_info" value="{{ __('Aclaration Notes') }}" />
                <x-admin.input id="pickup_input_info" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="pickup_input_info" />
                <x-admin.input-error for="pickup_input_info" class="mt-2" />
            </div>
        </div>

        {{-- Dropoff  Input extra --}}
        <h3 class="font-xl font-bold mt-10 mx-4 border-b border-gray-500">Dropoff  Input extra</h3>

        <div class="mt-4 w-full md:flex md:space-between">
            <div class="flex md:w-1/3">
                <!-- Show Input -->
                <div class="px-4 mt-4 md:mt-0 w-1/2">
                    <x-admin.label for="dropoff_show_input" value="{{ __('Show Input') }}" />
                    <select id="dropoff_show_input" name="dropoff_show_input" wire:model="dropoff_show_input"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="1">{{ __('Yes') }}</option>
                        <option value="0">{{ __('No') }}</option>
                    </select>
                    <x-admin.input-error for="dropoff_show_input" class="mt-2" />
                </div>

                <!-- Filling Require -->
                <div class="px-4 mt-4 md:mt-0 w-1/2">
                    <x-admin.label for="dropoff_input_require" value="{{ __('Filling Require') }}" />
                    <select id="dropoff_input_require" name="dropoff_input_require" wire:model="dropoff_input_require"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="1">{{ __('Yes') }}</option>
                        <option value="0">{{ __('No') }}</option>
                    </select>
                    <x-admin.input-error for="dropoff_input_require" class="mt-2" />
                </div>
            </div>

             <!-- Aclaration Notes -->
            <div class="px-4 mt-4 md:mt-0 md:w-2/3">
                <x-admin.label for="dropoff_input_info" value="{{ __('Aclaration Notes') }}" />
                <x-admin.input id="dropoff_input_info" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="dropoff_input_info" />
                <x-admin.input-error for="dropoff_input_info" class="mt-2" />
            </div>
        </div>

        {{-- Featured image --}}
        <h3 class="font-xl font-bold mt-10 mx-4 border-b border-gray-500">Image</h3>
        <div class="m-4 w-full md:flex md:space-between">            
            <livewire:common.featured-image-upload :model="$location" text="" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
