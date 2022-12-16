<div x-data="{ filters: false }">
    <div
        class="shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg"
    >
        <div
            x-show="filters"
            x-transition.duration.500ms
        >
            <div class="p-4 lg:grid lg:gap-2 lg:grid-cols-2 2xl:grid-cols-3">
                <div class="mt-4 flex flex-col">
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

                <div class="mt-4 flex flex-col">
                    <!-- Payment Status -->
                    <div class="px-4">
                        <x-admin.label for="payment_status" value="{{ __('Payment status') }}" />

                        <select id="payment_status" name="payment_status" wire:model="payment_status"
                            class="disable-arrow block w-full mt-2 pt-2 px-3 text-left border-gray-300 rounded-md"
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
                            class="disable-arrow block w-full mt-2 pt-2 px-3 text-left border-gray-300 rounded-md"
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
                            class="disable-arrow block w-full mt-2 pt-2 px-3 text-left border-gray-300 rounded-md"
                        >
                            <option value="">All</option>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="concluded">Concluded</option>
                            <option value="canceled">Canceled</option>
                        </select>
                    </div>

                    <!-- Vehicle -->
                    <div class="px-4 mt-4">
                        <x-admin.label for="vehicle" value="{{ __('Vehicle') }}" />

                        <select id="vehicle" name="vehicle" wire:model="vehicle"
                            class="disable-arrow block w-full mt-2 pt-2 px-3 text-left border-gray-300 rounded-md"
                        >
                            <option value="">All</option>
                            @foreach($vehicles as $id => $name)
                                <option value="{{$id}}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Vendor -->
                    <div class="px-4 mt-4">
                        <x-admin.label for="vendor" value="{{ __('Vendor') }}" />

                        <select id="vendor" name="vendor" wire:model="vendor"
                            class="disable-arrow block w-full mt-2 pt-2 px-3 text-left border-gray-300 rounded-md"
                        >
                            <option value="">All</option>
                            @foreach($vendors as $id => $name)
                                <option value="{{$id}}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-4 flex flex-col">
                    <!-- Order Number -->
                    <div class="px-4">
                        <x-admin.label for="order_number" value="{{ __('Order Number') }}" />
                        <x-admin.input id="order_number" type="text" class="w-full mt-2 block" maxlength="255" wire:model="order_number" autocomplete="order_number" />
                    </div>

                    <!-- Email -->
                    <div class="px-4 mt-4">
                        <x-admin.label for="email" value="{{ __('Email') }}" />
                        <x-admin.input id="email" type="text" class="w-full mt-2 block" maxlength="255" wire:model="email" autocomplete="email" />
                    </div>

                    <!-- First Name -->
                    <div class="px-4 mt-4">
                        <x-admin.label for="first_name" value="{{ __('First Name') }}" />
                        <x-admin.input id="first_name" type="text" class="w-full mt-2 block" maxlength="255" wire:model="first_name" autocomplete="first_name" />
                    </div>

                    <!-- Last Name -->
                    <div class="px-4 mt-4">
                        <x-admin.label for="last_name" value="{{ __('Last Name') }}" />
                        <x-admin.input id="last_name" type="text" class="w-full mt-2 block" maxlength="255" wire:model="last_name" autocomplete="last_name" />
                    </div>

                    <!-- Telephone -->
                    <div class="px-4 mt-4">
                        <x-admin.label for="telephone" value="{{ __('Telephone') }}" />
                        <x-admin.input id="telephone" type="text" class="w-full mt-2 block" maxlength="255" wire:model="telephone" autocomplete="telephone" />
                    </div>
                </div>
            </div>

            <div class="mt-4 mb-8 text-center">
                <button class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                    type="button"
                    wire:click="resetFilters"
                >
                    Reset FIlters
                </button>

                <button class="inline-flex items-center ml-4 px-4 py-2 bg-yellow-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-yellow-700 hover:text-yellow-700 active:bg-white active:border-yellow-700 active:text-yellow-700 disabled:opacity-25 transition ease-in-out duration-150"
                    type="button"
                    @click.prevent="filters=!filters"
                >
                    Hide FIlters
                </button>
            </div>
        </div>

        <div
            class="p-2 text-center"
            x-show="!filters"
            x-transition.duration.500ms
        >
            <button class="inline-flex items-center px-4 py-2 bg-yellow-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-yellow-700 hover:text-yellow-700 active:bg-white active:border-yellow-700 active:text-yellow-700 disabled:opacity-25 transition ease-in-out duration-150"
                type="button"
                @click.prevent="filters=!filters"
            >
                Show FIlters
            </button>
        </div>
    </div>
</div>
