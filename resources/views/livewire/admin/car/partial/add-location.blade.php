<x-admin.form-section submit="addLocation">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Location -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="open_to" value="{{ __('Location') }}" />

            <select id="location" name="location" wire:model="location"
                class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
            >
                <option value="">Select Location</option>
                @foreach ($availableLocations as $availableLocation)
                    <option value="{{$availableLocation["id"]}}">{{ $availableLocation["name"] }}</option>
                @endforeach
            </select>

            <x-admin.input-error for="location" class="mt-2" />
        </div>

        <!-- Open From -->
        <div class="px-4">
            <x-admin.label for="open_from" value="{{ __('Open From') }}" />

            <select id="open_from" name="open_from" wire:model="open_from"
                class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
            >
                @foreach ($hours as $hour)
                    <option value="{{$hour}}">{{ $hour }}</option>
                @endforeach
            </select>
        </div>

        <!-- Open To -->
        <div class="px-4">
            <x-admin.label for="open_to" value="{{ __('Open To') }}" />

            <select id="open_to" name="open_to" wire:model="open_to"
                class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
            >
                @foreach ($hours as $hour)
                    <option value="{{$hour}}">{{ $hour }}</option>
                @endforeach
            </select>
        </div>

        <!-- Pickup available -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="pickup_available" value="{{ __('Pickup available') }}" />

            <select id="pickup_available" name="pickup_available" wire:model="pickup_available"
                class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
            >
                <option value="1">{{ __('Yes') }}</option>
                <option value="0">{{ __('No') }}</option>
            </select>
        </div>

        <!-- Dropoff available -->
        <div class="px-4 mt-4 md:mt-0">
            <x-admin.label for="dropoff_available" value="{{ __('Dropoff available') }}" />

            <select id="dropoff_available" name="dropoff_available" wire:model="dropoff_available"
                class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
            >
                <option value="1">{{ __('Yes') }}</option>
                <option value="0">{{ __('No') }}</option>
            </select>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
