<x-admin.form-section submit="saveBooking" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <div class="w-full md:grid md:gap-2 md:grid-cols-2">
             <!-- Vendor -->
            <div class="px-4">
                <x-admin.label for="vendor" value="{{ __('Vendor') }}" />

                <select id="vendor" name="vendor" wire:model="vendor"
                    class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                >
                    <option value="">Select Vendor</option>
                    @foreach ($vendors as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>

                <x-admin.input-error for="vendor" class="mt-2" />
            </div>

            <!-- Car -->
            <div class="px-4 mt-4 md:mt-0">
                @if (!emptyOrNull($vendor))
                    <x-admin.label for="car" value="{{ __('Car') }}" />

                    <select id="car" name="car" wire:model="car"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="">Select Car</option>
                        @foreach ($cars as $id => $name)
                            <option value="{{$id}}">{{ $name }}</option>
                        @endforeach
                    </select>

                    <x-admin.input-error for="car" class="mt-2" />
                @endif
            </div>
        </div>

        <div class="mt-4 w-full md:gap-2 md:grid-cols-2 {{emptyOrNull($vendor) ? 'hidden' : 'md:grid'}}">
            {{-- Pickup --}}
            <div class="px-4">
                {{-- Pickup location --}}
                <x-admin.label for="pickup_location" value="{{ __('Pickup location') }}" />

                <select id="pickup_location" name="pickup_location" wire:model="pickup_location"
                    class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                >
                    <option value="">Select pickup location</option>
                    @foreach ($locations as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>

                <x-admin.input-error for="pickup_location" class="mt-2" />

                <div class="mt-4">
                    {{-- Pickup Date --}}
                    <x-admin.label for="pickup_date" value="{{ __('Pickup date') }}" />

                    <div class="mt-1 flex justify-start">
                        <div>
                            <x-admin.date-picker
                                name="pickup_date"
                                placeholder="Click to select date"
                                :yearRange="[
                                    now()->format('Y'),
                                    now()->addYears(2)->format('Y')
                                ]"
                                autocomplete="off"
                                is-wire="true"
                                variable="pickup_date"
                            />

                            <x-admin.input-error for="pickup_date" class="mt-2" />
                        </div>

                        <div class="ml-4">
                            <select id="pickup_hour" name="pickup_hour" wire:model="pickup_hour"
                                class="disable-arrow block w-24 h-10 pt-2 px-3 text-left border-gray-300 rounded-md"
                            >
                                @foreach ($hours as $hour)
                                    <option value="{{$hour}}">{{ $hour }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Dropoff --}}
            <div class="px-4 mt-4 md:mt-0">
                {{-- Dropoff location --}}
                <x-admin.label for="dropoff_location" value="{{ __('Dropoff location') }}" />

                <select id="dropoff_location" name="dropoff_location" wire:model="dropoff_location"
                    class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                >
                    <option value="">Select dropoff location</option>
                    @foreach ($locations as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>

                <x-admin.input-error for="dropoff_location" class="mt-2" />

                <div class="mt-4">
                    {{-- Dropoff Date --}}
                    <x-admin.label for="dropoff_date" value="{{ __('Dropoff date') }}" />

                    <div class="mt-1 flex justify-start">
                        <div>
                            <x-admin.date-picker
                                name="dropoff_date"
                                placeholder="Click to select date"
                                :yearRange="[
                                    now()->format('Y'),
                                    now()->addYears(2)->format('Y')
                                ]"
                                autocomplete="off"
                                is-wire="true"
                                variable="dropoff_date"
                            />

                            <x-admin.input-error for="dropoff_date" class="mt-2" />
                        </div>

                        <div class="ml-4">
                            <select id="dropoff_hour" name="dropoff_hour" wire:model="dropoff_hour"
                                class="disable-arrow block w-24 h-10 pt-2 px-3 text-left border-gray-300 rounded-md"
                            >
                                @foreach ($hours as $hour)
                                    <option value="{{$hour}}">{{ $hour }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        @if (!emptyOrNull($vendor))
            <x-admin.button wire:loading.attr="disabled">
                {{ $formButton }}
            </x-admin.button>
        @endif
    </x-slot>
</x-admin.form-section>
