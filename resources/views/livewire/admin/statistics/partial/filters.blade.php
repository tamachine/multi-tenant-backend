<div class="shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg">
    <div class="p-4 sm:grid sm:gap-2 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Vendor -->
        <div class="px-4 mt-4 sm:mt-0">
            <x-admin.label for="vendor" value="{{ __('Vendor') }}" />

            <select id="vendor" name="vendor" wire:model.lazy="vendor"
                class="disable-arrow block w-full mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
            >
                <option value="">All</option>
                @foreach($vendors as $id => $name)
                    <option value="{{$id}}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Date -->
        <div class="px-4 mt-4 sm:mt-0">
            <x-admin.label for="date" value="{{ __('Date') }}" />

            <select id="date" name="date" wire:model.lazy="date"
                class="disable-arrow block w-full mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
            >
                <option value="">All time</option>
                @for($i=now()->year; $i>=2017; $i--)
                    <option value="{{$i}}">{{ $i }}</option>
                @endfor
                <option value="0">Last year</option>
                <option value="1">Last 2 years</option>
                <option value="2">Last 3 years</option>
                <option value="3">Last 4 years</option>
                <option value="4">Last 5 years</option>
            </select>

            <x-admin.input-help value="{{ __('If the date filter is used, the booking date filter will be ignored') }}" />
        </div>

        <!-- Booking Date -->
        <div class="px-4 mt-4 sm:mt-0">
            <x-admin.label for="booking_date" value="{{ __('Booking date') }}" />

            <div class="mt-1 flex justify-start items-center">
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
    </div>
</div>
