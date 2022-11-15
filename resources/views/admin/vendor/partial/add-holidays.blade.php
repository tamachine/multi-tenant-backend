<x-admin.form-section submit="addHolidays" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Date -->
        <div class="block sm:grid sm:gap-2 sm:grid-cols-2">
            <div class="px-4 mt-4 md:mt-0">
                <x-admin.label for="date" value="{{ __('Date') }}" />

                <x-admin.date-picker
                    name="date"
                    placeholder="Click to select date"
                    :yearRange="[
                        now()->format('Y'),
                        now()->addYears(2)->format('Y')
                    ]"
                    autocomplete="off"
                    is-wire="true"
                    variable="date"
                />

                <x-admin.input-error for="date" class="mt-2" />
            </div>

            <!-- Closed -->
            <div class="px-4 mt-4 md:mt-0">
                <x-admin.label for="closed" value="{{ __('Closed') }}" />
                <select id="closed" name="closed" wire:model="closed"
                    class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    <option value="1">{{ __('Yes') }}</option>
                    <option value="0">{{ __('No') }}</option>
                </select>
            </div>
        </div>

        @if(!$closed)
            <div class="mt-4 sm:grid sm:gap-2 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Pick From -->
                <div class="px-4">
                    <x-admin.label for="pickup_from" value="{{ __('Pick From') }}" />
                    <select id="pickup_from" name="pickup_from" wire:model="pickup_from"
                        class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                    >
                        @foreach ($hours as $hour)
                            <option value="{{$hour}}">{{ $hour }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Pick To -->
                <div class="px-4">
                    <x-admin.label for="pickup_to" value="{{ __('Pick To') }}" />
                    <select id="pickup_to" name="pickup_to" wire:model="pickup_to"
                        class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                    >
                        @foreach ($hours as $hour)
                            <option value="{{$hour}}">{{ $hour }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Drop From -->
                <div class="px-4">
                    <x-admin.label for="dropoff_from" value="{{ __('Drop From') }}" />
                    <select id="dropoff_from" name="dropoff_from" wire:model="dropoff_from"
                        class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                    >
                        @foreach ($hours as $hour)
                            <option value="{{$hour}}">{{ $hour }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Drop To -->
                <div class="px-4">
                    <x-admin.label for="dropoff_to" value="{{ __('Drop To') }}" />
                    <select id="dropoff_to" name="dropoff_to" wire:model="dropoff_to"
                        class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                    >
                        @foreach ($hours as $hour)
                            <option value="{{$hour}}">{{ $hour }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
