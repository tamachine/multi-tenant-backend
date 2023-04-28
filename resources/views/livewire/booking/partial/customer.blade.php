<x-admin.form-section submit="saveCustomer" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <div class="w-full sm:grid sm:gap-2 sm:grid-cols-2 lg:grid-cols-3">
            <div>
                <!-- First name -->
                <div class="mt-4 px-4">
                    <x-admin.label for="first_name" value="{{ __('First name') }}" />
                    <x-admin.input id="first_name" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="first_name" autocomplete="first_name" />
                    <x-admin.input-error for="first_name" class="mt-2" />
                </div>

                <!-- Last name -->
                <div class="mt-4 px-4">
                    <x-admin.label for="last_name" value="{{ __('Last name') }}" />
                    <x-admin.input id="last_name" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="last_name" autocomplete="last_name" />
                    <x-admin.input-error for="last_name" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4 px-4">
                    <x-admin.label for="email" value="{{ __('Email') }}" />
                    <x-admin.input id="email" type="email" class="w-full mt-1 block" maxlength="255" wire:model.defer="email" autocomplete="email" />
                    <x-admin.input-error for="email" class="mt-2" />
                </div>

                <!-- Telephone -->
                <div class="mt-4 px-4">
                    <x-admin.label for="telephone" value="{{ __('Telephone') }}" />
                    <x-admin.input id="telephone" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="telephone" autocomplete="telephone" />
                    <x-admin.input-error for="telephone" class="mt-2" />
                </div>

                <!-- Address -->
                <div class="mt-4 px-4">
                    <x-admin.label for="address" value="{{ __('Address') }}" />
                    <textarea id="address" class="mt-1 focus:ring-purple-700 focus:purple-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400"
                        wire:model.defer="address" rows="3">
                    </textarea>
                    <x-admin.input-error for="address" class="mt-2" />
                </div>

                <!-- Postal code -->
                <div class="mt-4 px-4">
                    <x-admin.label for="postal_code" value="{{ __('Postal code') }}" />
                    <x-admin.input id="postal_code" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="postal_code" autocomplete="postal_code" />
                    <x-admin.input-error for="postal_code" class="mt-2" />
                </div>

                <!-- City -->
                <div class="mt-4 px-4">
                    <x-admin.label for="city" value="{{ __('City') }}" />
                    <x-admin.input id="city" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="city" autocomplete="city" />
                    <x-admin.input-error for="city" class="mt-2" />
                </div>

                <!-- State/Province -->
                <div class="mt-4 px-4">
                    <x-admin.label for="state" value="{{ __('State/Province') }}" />
                    <x-admin.input id="state" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="state" autocomplete="state" />
                    <x-admin.input-error for="state" class="mt-2" />
                </div>

                <!-- Country -->
                <div class="mt-4 px-4">
                    <x-admin.label for="country" value="{{ __('Country') }}" />
                    <x-admin.input id="country" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="country" autocomplete="country" />
                    <x-admin.input-error for="country" class="mt-2" />
                </div>
            </div>

            <div>
                <!-- Driver name -->
                <div class="mt-4 px-4">
                    <x-admin.label for="driver_name" value="{{ __('Driver name') }}" />
                    <x-admin.input id="driver_name" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="driver_name" autocomplete="driver_name" />
                    <x-admin.input-error for="driver_name" class="mt-2" />
                </div>

                <!-- Driver birth date -->
                <div class="mt-4 px-4">
                    <x-admin.label for="driver_date_birth" value="{{ __('Driver birth date') }}" />
                    <x-admin.input id="driver_date_birth" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="driver_date_birth" autocomplete="driver_date_birth" />
                    <x-admin.input-error for="driver_date_birth" class="mt-2" />
                </div>

                <!-- Driver Passport / ID -->
                <div class="mt-4 px-4">
                    <x-admin.label for="driver_id_passport" value="{{ __('Driver Passport / ID') }}" />
                    <x-admin.input id="driver_id_passport" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="driver_id_passport" />
                    <x-admin.input-error for="driver_id_passport" class="mt-2" />
                </div>

                <!-- Driver license number -->
                <div class="mt-4 px-4">
                    <x-admin.label for="driver_license_number" value="{{ __('Driver license number') }}" />
                    <x-admin.input id="driver_license_number" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="driver_license_number" />
                    <x-admin.input-error for="driver_license_number" class="mt-2" />
                </div>

                <!-- Extra Driver 1 -->
                <div class="mt-4 px-4">
                    <x-admin.label for="extra_driver_info1" value="{{ __('Extra Driver 1') }}" />
                    <x-admin.input id="extra_driver_info1" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="extra_driver_info1" />
                    <x-admin.input-error for="extra_driver_info1" class="mt-2" />
                </div>

                <!-- Extra Driver 2 -->
                <div class="mt-4 px-4">
                    <x-admin.label for="extra_driver_info2" value="{{ __('Extra Driver 3') }}" />
                    <x-admin.input id="extra_driver_info2" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="extra_driver_info2" />
                    <x-admin.input-error for="extra_driver_info1" class="mt-2" />
                </div>

                <!-- Extra Driver 3 -->
                <div class="mt-4 px-4">
                    <x-admin.label for="extra_driver_info3" value="{{ __('Extra Driver 4') }}" />
                    <x-admin.input id="extra_driver_info3" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="extra_driver_info3" />
                    <x-admin.input-error for="extra_driver_info3" class="mt-2" />
                </div>

                <!-- Extra Driver 4 -->
                <div class="mt-4 px-4">
                    <x-admin.label for="extra_driver_info4" value="{{ __('Extra Driver 4') }}" />
                    <x-admin.input id="extra_driver_info4" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="extra_driver_info4" />
                    <x-admin.input-error for="extra_driver_info4" class="mt-2" />
                </div>

                <!-- Child seat info -->
                <div class="mt-4 px-4">
                    <x-admin.label for="weight_info" value="{{ __('Child seat info') }}" />
                    <textarea id="weight_info" class="mt-1 focus:ring-purple-700 focus:purple-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400"
                        wire:model.defer="weight_info" rows="3">
                    </textarea>
                    <x-admin.input-error for="weight_info" class="mt-2" />
                </div>
            </div>

            <div>
                <!-- Number of passengers -->
                <div class="mt-4 px-4">
                    <x-admin.label for="number_passengers" value="{{ __('Number of passengers') }}" />
                    <x-admin.input id="number_passengers" type="number" class="w-20 mt-1 block" min="0" max="20" wire:model.defer="number_passengers" />
                    <x-admin.input-error for="number_passengers" class="mt-2" />
                </div>

                <!-- Pickup info -->
                <div class="mt-4 px-4">
                    <x-admin.label for="pickup_input_info" value="{{ __('Pickup info') }}" />
                    <x-admin.input id="pickup_input_info" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="pickup_input_info" />
                    <x-admin.input-error for="pickup_input_info" class="mt-2" />
                </div>

                <!-- Dropoff info -->
                <div class="mt-4 px-4">
                    <x-admin.label for="dropoff_input_info" value="{{ __('Dropoff info') }}" />
                    <x-admin.input id="dropoff_input_info" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="dropoff_input_info" />
                    <x-admin.input-error for="dropoff_input_info" class="mt-2" />
                </div>                
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
