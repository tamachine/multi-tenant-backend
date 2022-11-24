<x-admin.form-section submit="dummy" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @if (count($currentLocations))
            <div class="mt-8 md:mt-0 shadow overflow-x-auto border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="border-b border-gray-200">
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Location
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Open From
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Open To
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pickup
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dropoff
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($currentLocations as $key => $record)
                            <tr class="{{$key % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                <td class="px-4 py-2 whitespace-nowrap">
                                    {{$record["location"]}}
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <select id="open_from_{{ $key }}" name="open_from_{{ $key }}" wire:model="currentLocations.{{ $key }}.open_from"
                                        class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                                    >
                                        @foreach ($hours as $hour)
                                            <option value="{{$hour}}">{{ $hour }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <select id="open_to_{{ $key }}" name="open_to_{{ $key }}" wire:model="currentLocations.{{ $key }}.open_to"
                                        class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                                    >
                                        @foreach ($hours as $hour)
                                            <option value="{{$hour}}">{{ $hour }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <select id="pickup_available_{{ $key }}" name="pickup_available_{{ $key }}" wire:model="currentLocations.{{ $key }}.pickup_available"
                                        class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                                    >
                                        <option value="1">{{ __('Yes') }}</option>
                                        <option value="0">{{ __('No') }}</option>
                                    </select>
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <select id="dropoff_available_{{ $key }}" name="dropoff_available_{{ $key }}" wire:model="currentLocations.{{ $key }}.dropoff_available"
                                        class="disable-arrow block w-24 h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                                    >
                                        <option value="1">{{ __('Yes') }}</option>
                                        <option value="0">{{ __('No') }}</option>
                                    </select>
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <button class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                                        type="button"
                                        wire:click="editLocation({{$key}})"
                                    >
                                        Edit
                                    </button>
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <x-admin.delete-item
                                            trigger="Delete"
                                            title="Delete free day plan"
                                            class="inline-flex items-center px-4 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                                            name="{{ $record['location'] }}"
                                            hashid="{{ $record['id'] }}"
                                            event="delete-location"
                                        />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white shadow mt-8 md:mt-0 px-4 py-5 sm:rounded-lg sm:p-6">
                <h5>This car has no locations assigned yet.</h5>
            </div>
        @endif
    </x-slot>
</x-admin.form-section>

@push('scripts')
    <script>
        window.addEventListener('delete-location', event => {
            @this.call('deleteLocation', event.detail.hashid)
        });
    </script>
@endpush
