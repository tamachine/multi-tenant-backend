<x-admin.form-section submit="saveLocations" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @if (count($lines))
            <div class="mt-8 md:mt-0 shadow overflow-x-auto border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="border-b border-gray-200">
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                            </th>

                            @foreach ($locations as $key => $location)
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{$location}}
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($lines as $key => $line)
                            <tr class="{{$key % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                <td class="px-4 py-2 whitespace-nowrap">
                                    {{$line["name"]}}
                                </td>

                                @foreach ($line['fees'] as $locationKey => $locationFee)
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        @if ($key != $locationKey)
                                            <x-admin.input id="fee_{{ $key }}" wire:model="lines.{{ $key }}.fees.{{ $locationKey }}"
                                                type="number" step="any" class="mt-1 block w-20" />
                                            <x-admin.input-error for="lines.{{ $key }}.fees.{{ $locationKey }}" class="mt-2" />
                                        @else
                                            -
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                <h5>This vendor has no locations assigned.</h5>
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
