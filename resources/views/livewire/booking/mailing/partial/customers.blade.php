<x-admin.form-section submit="customerExport" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <div class="p-4 md:grid md:gap-2 md:grid-cols-2">
            <div class="mt-4 md:mt-0 flex flex-col">
                <!-- Vendor -->
                <div class="px-4">
                    <x-admin.label for="vendor" value="{{ __('Vendor') }}" />

                    <select id="vendor" name="vendor" wire:model="vendor"
                        class="disable-arrow block w-full h-10 mt-2 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="">All</option>
                        @foreach($vendors as $id => $name)
                            <option value="{{$id}}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Payment Status -->
                <div class="px-4 mt-4">
                    <x-admin.label for="payment_status" value="{{ __('Payment status') }}" />

                    <select id="payment_status" name="payment_status" wire:model="payment_status"
                        class="disable-arrow block w-full h-10 mt-2 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="">All</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>

                <!-- Vendor Status -->
                <div class="px-4 mt-4">
                    <x-admin.label for="vendor_status" value="{{ __('Vendor status') }}" />

                    <select id="vendor_status" name="vendor_status" wire:model="vendor_status"
                        class="disable-arrow block w-full h-10 mt-2 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="">All</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>

                <!-- Booking Status -->
                <div class="px-4 mt-4">
                    <x-admin.label for="booking_status" value="{{ __('Booking status') }}" />

                    <select id="booking_status" name="booking_status" wire:model="booking_status"
                        class="disable-arrow block w-full h-10 mt-2 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="">All</option>
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="concluded">Concluded</option>
                        <option value="canceled">Canceled</option>
                    </select>
                </div>
            </div>

            <div class="mt-4 md:mt-0 flex flex-col">
                <!-- Booking Date -->
                <div class="px-4">
                    <x-admin.label for="booking_date" value="{{ __('Booking date') }}" />

                    <div class="mt-2 flex justify-start items-center">
                        <x-admin.date-picker
                            name="booking_start_date"
                            placeholder=""
                            :yearRange="[
                                now()->subYears(10)->format('Y'),
                                now()->format('Y')
                            ]"
                            autocomplete="off"
                            is-wire="true"
                            variable="booking_start_date"
                        />

                        <div class="ml-2 font-semibold text-sm text-gray-700">
                            To
                        </div>

                        <div class="ml-2">
                            <x-admin.date-picker
                                name="booking_end_date"
                                placeholder=""
                                :yearRange="[
                                    now()->subYears(10)->format('Y'),
                                    now()->format('Y')
                                ]"
                                autocomplete="off"
                                is-wire="true"
                                variable="booking_end_date"
                            />
                        </div>
                    </div>
                </div>

                <!-- Pickup Date -->
                <div class="px-4 mt-4">
                    <x-admin.label for="pickup_date" value="{{ __('Pickup date') }}" />

                    <div class="mt-2 flex justify-start items-center">
                        <x-admin.date-picker
                            name="pickup_start_date"
                            placeholder=""
                            :yearRange="[
                                now()->subYears(10)->format('Y'),
                                now()->addYears(3)->format('Y')
                            ]"
                            autocomplete="off"
                            is-wire="true"
                            variable="pickup_start_date"
                        />

                        <div class="ml-2 font-semibold text-sm text-gray-700">
                            To
                        </div>

                        <div class="ml-2">
                            <x-admin.date-picker
                                name="pickup_end_date"
                                placeholder=""
                                :yearRange="[
                                    now()->subYears(10)->format('Y'),
                                    now()->addYears(3)->format('Y')
                                ]"
                                autocomplete="off"
                                is-wire="true"
                                variable="pickup_end_date"
                            />
                        </div>
                    </div>
                </div>

                <!-- Dropoff Date -->
                <div class="px-4 mt-4">
                    <x-admin.label for="dropoff_date" value="{{ __('Dropoff date') }}" />

                    <div class="mt-2 flex justify-start items-center">
                        <x-admin.date-picker
                            name="dropoff_start_date"
                            placeholder=""
                            :yearRange="[
                                now()->subYears(10)->format('Y'),
                                now()->addYears(3)->format('Y')
                            ]"
                            autocomplete="off"
                            is-wire="true"
                            variable="dropoff_start_date"
                        />

                        <div class="ml-2 font-semibold text-sm text-gray-700">
                            To
                        </div>

                        <div class="ml-2">
                            <x-admin.date-picker
                                name="dropoff_end_date"
                                placeholder=""
                                :yearRange="[
                                    now()->subYears(10)->format('Y'),
                                    now()->addYears(3)->format('Y')
                                ]"
                                autocomplete="off"
                                is-wire="true"
                                variable="dropoff_end_date"
                            />
                        </div>
                    </div>
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
