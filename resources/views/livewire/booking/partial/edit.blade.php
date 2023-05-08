<x-admin.form-section submit="editBooking" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <div class="w-full sm:grid sm:gap-2 sm:grid-cols-3">
            <!-- Order number -->
            <div class="px-4 mt-4 md:mt-0">
                <x-admin.label for="order_id" class="mb-1" value="{{ __('Order number') }}" />
                <strong>{{$order_id}}</strong>
            </div>

            <!-- Vendor -->
            <div class="px-4 mt-4 md:mt-0">
                <x-admin.label for="vendor" class="mb-1"  value="{{ __('Vendor') }}" />
                <strong>{{$vendor_name}}</strong>
            </div>

            <!-- Bopoking date -->
            <div class="px-4 mt-4 md:mt-0">
                <x-admin.label for="booking_date" class="mb-1"  value="{{ __('Booking date') }}" />
                <strong>{{$booking_date}}</strong>
            </div>
        </div>

        <hr class="mt-4 px-4">

        <div class="w-full md:grid md:gap-2 md:grid-cols-2 lg:grid-cols-3">
            <div class="mt-4">
                <!-- Car -->
                <div class="px-4">
                    <x-admin.label for="car" value="{{ __('Car') }}" />

                    @if ($car)
                        <select id="car" name="car" wire:model="car"
                            class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                        >
                            @foreach ($cars as $id => $name)
                                <option value="{{$id}}">{{ $name }}</option>
                            @endforeach
                        </select>

                        <x-admin.input-error for="car" class="mt-2" />
                    @else
                        <div class="mt-1 h-10">
                            {{$car_name}}
                        </div>
                    @endif
                </div>

                {{-- Pickup location --}}
                <div class="mt-4 px-4">
                    <x-admin.label for="pickup_location" value="{{ __('Pickup location') }}" />

                    <select id="pickup_location" name="pickup_location" wire:model="pickup_location"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        @foreach ($locations as $id => $name)
                            <option value="{{$id}}">{{ $name }}</option>
                        @endforeach
                    </select>

                    <x-admin.input-error for="pickup_location" class="mt-2" />
                </div>

                {{-- Dropoff location --}}
                <div class="mt-4 px-4">
                    <x-admin.label for="dropoff_location" value="{{ __('Dropoff location') }}" />

                    <select id="dropoff_location" name="dropoff_location" wire:model="dropoff_location"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        @foreach ($locations as $id => $name)
                            <option value="{{$id}}">{{ $name }}</option>
                        @endforeach
                    </select>

                    <x-admin.input-error for="dropoff_location" class="mt-2" />
                </div>

                {{-- Pickup Date --}}
                <div class="mt-4 px-4">
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

                {{-- Dropoff Date --}}
                <div class="mt-4 px-4">
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

            <div class="mt-4">
                {{-- Total price --}}
                <div class="px-4">
                    <x-admin.label for="total_price" value="{{ __('Total price') }}" />
                    <x-admin.input id="total_price" type="number" class="w-32 h-10 mt-1 block" min="0" step="1" wire:model="total_price" />
                    <x-admin.input-error for="total_price" class="mt-2" />
                </div>

                {{-- Online Payment --}}
                <div class="px-4 mt-4">
                    <x-admin.label for="online_payment" value="{{ __('Online payment') }}" />
                    <x-admin.input id="online_payment" type="number" class="w-32 h-10 mt-1 block" min="0" step="1" wire:model="online_payment" />
                    <x-admin.input-error for="online_payment" class="mt-2" />
                </div>

                {{-- Remaining Balance --}}
                <div class="px-4 mt-4">
                    <x-admin.label for="remaining_balance" value="{{ __('Remaining Balance') }}" />
                    <div class="border rounded-md shadow-sm border-gray-300 bg-gray-200 w-32 h-10 mt-1 pt-2 pl-3">
                        {{$this->remaining_balance}}
                    </div>
                </div>
            </div>

            <div class="mt-4">
                {{-- Payment status --}}
                <div class="px-4">
                    <x-admin.label for="payment_status" value="{{ __('Payment status') }}" />

                    <select id="payment_status" name="payment_status" wire:model="payment_status"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                    </select>
                </div>

                {{-- Vendor status --}}
                <div class="mt-4 px-4">
                    <x-admin.label for="vendor_status" value="{{ __('Vendor status') }}" />

                    <select id="vendor_status" name="vendor_status" wire:model="vendor_status"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                    </select>
                </div>

                {{-- Booking Status --}}
                <div class="mt-4 px-4">
                    <x-admin.label for="status" value="{{ __('Booking status') }}" />

                    <select id="status" name="status" wire:model="status"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="concluded">Concluded</option>
                        <option value="canceled">Canceled</option>
                        <option value="noshow">No Show</option>
                    </select>
                </div>

                {{-- Cancel Reason --}}
                @if ($status == 'canceled')
                    <div class="mt-4 px-4">
                        <x-admin.label for="cancel_reason" value="{{ __('Cancel reason') }}" />
                        <x-admin.input id="cancel_reason" type="text" class="w-full h-10 mt-1 block" wire:model="cancel_reason" />
                        <x-admin.input-error for="cancel_reason" class="mt-2" />
                    </div>
                @endif
            </div>
        </div>

        <hr class="mt-4 px-4">

        <div class="mt-4 px-4">
            <x-admin.label for="comment" value="{{ __('Add comment') }}" />
            <textarea id="comment" class="mt-1 focus:ring-purple-700 focus:purple-700 block w-full lg:w-1/2 shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400"
                wire:model.defer="comment" rows="3">
            </textarea>
            <a href="javascript:void(0);"
                class="mt-1 text-xs text-purple-700 hover:underline"
                @click.prevent="tab='log'"
            >
                See the booking log
            </a>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
