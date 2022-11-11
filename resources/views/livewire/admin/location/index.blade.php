<div class="flex flex-col p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <x-admin.search />

            @if ($locations->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($locations as $index => $location)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <select
                                            class="disable-arrow block w-20 h-10 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                                            wire:change="changeOrder({{$location->id}}, $event.target.value)"
                                        >
                                        @for ($i = 1; $i <= 15; $i++)
                                            <option value="{{ $i }}" {{$location->order_appearance == $i ? 'selected' : ''}}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{route('location.edit', $location->hashid)}}" class="text-purple-700 hover:underline">
                                            {{ $location->name }}
                                        </a>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $locations->links('livewire.partials.pagination') }}
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No locations found</h5>
                </div>
            @endif
        </div>
    </div>
</div>
