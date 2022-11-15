<x-admin.form-section submit="saveLocations" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @if (count($holidays))
            <div class="mt-8 md:mt-0 shadow overflow-x-auto border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="border-b border-gray-200">
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Closed
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pick From
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pick To
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Drop From
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Drop To
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($holidays as $key => $holiday)
                            <tr class="{{$key % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <x-admin.date-picker
                                        name="date_{{ $key }}"
                                        placeholder="Click to select date"
                                        :yearRange="[
                                            now()->format('Y'),
                                            now()->addYears(2)->format('Y')
                                        ]"
                                        autocomplete="off"
                                        is-wire="true"
                                        variable="holidays.{{$key}}.date"
                                    />
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <label for="closed_{{ $key }}" class="inline-flex items-center">
                                        <x-admin.checkbox id="closed_{{ $key }}" wire:model="holidays.{{ $key }}.closed" />
                                    </label>
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    @if(!$holiday["closed"])
                                        <select id="pickup_from_{{ $key }}" name="pickup_from_{{ $key }}" wire:model="holidays.{{ $key }}.pickup_from"
                                            class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                                        >
                                            @foreach ($hours as $hour)
                                                <option value="{{$hour}}">{{ $hour }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    @if(!$holiday["closed"])
                                        <select id="pickup_to_{{ $key }}" name="pickup_to_{{ $key }}" wire:model="holidays.{{ $key }}.pickup_to"
                                            class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                                        >
                                            @foreach ($hours as $hour)
                                                <option value="{{$hour}}">{{ $hour }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    @if(!$holiday["closed"])
                                        <select id="dropoff_from_{{ $key }}" name="dropoff_from_{{ $key }}" wire:model="holidays.{{ $key }}.dropoff_from"
                                            class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                                        >
                                            @foreach ($hours as $hour)
                                                <option value="{{$hour}}">{{ $hour }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    @if(!$holiday["closed"])
                                        <select id="dropoff_to_{{ $key }}" name="dropoff_to_{{ $key }}" wire:model="holidays.{{ $key }}.dropoff_to"
                                            class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                                        >
                                            @foreach ($hours as $hour)
                                                <option value="{{$hour}}">{{ $hour }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <button class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                                        type="button"
                                        wire:click="editHolidays({{$key}})"
                                    >
                                        Edit
                                    </button>
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <button class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                                        type="button"
                                        wire:click="deleteHolidays({{$key}})"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white shadow mt-8 md:mt-0 px-4 py-5 sm:rounded-lg sm:p-6">
                <h5>This vendor has no holidays yet.</h5>
            </div>
        @endif
    </x-slot>
</x-admin.form-section>
