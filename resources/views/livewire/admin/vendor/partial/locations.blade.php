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
                                Location
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Available
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($lines as $key => $line)
                            <tr class="{{$key % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                <td class="px-4 py-2 whitespace-nowrap">
                                    {{$line["name"]}}
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <label for="available" class="inline-flex items-center">
                                        <x-admin.checkbox id="available" wire:model="lines.{{ $key }}.available" />
                                    </label>
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    @if($line["available"])
                                        <x-admin.input id="price_{{ $key }}" wire:model="lines.{{ $key }}.price"
                                            type="number" step="any" class="mt-1 block w-20" />
                                        <x-admin.input-error for="lines.{{ $key }}.price" class="mt-2" />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
