<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <!-- Filters -->
            <div class="sm:flex sm:justify-start">
                <select id="status" name="status" wire:model="status"
                    class="disable-arrow block w-32 h-10 mt-4 sm:mt-0 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    @foreach(config('admin.cars_status') as $statusKey => $statusOption)
                        <option value="{{$statusKey}}">{{ $statusOption }}</option>
                    @endforeach
                </select>

                <select id="order" name="order" wire:model="order"
                    class="disable-arrow block w-48 h-10 mt-4 sm:mt-0 sm:ml-4 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    @foreach(config('admin.cars_order') as $statusKey => $statusOption)
                        <option value="{{$statusKey}}">{{ $statusOption }}</option>
                    @endforeach
                </select>

                <select id="vendor" name="vendor" wire:model="vendor"
                    class="disable-arrow block w-auto h-10 mt-4 sm:mt-0 sm:ml-4 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
                >
                    <option value="">All vendors</option>
                    @foreach ($vendors as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <x-admin.search />

            @if ($cars->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Vendor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fleet Order
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($cars as $index => $car)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="w-16 text-center text-shadow"
                                            style="background:{{$car->brand_color}}"
                                        >
                                            {{($page - 1) * perPage() + $index + 1}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{route('car.edit', $car->hashid)}}" class="text-purple-700 hover:underline">
                                            {{ $car->name }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $car->vendor_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $car->active ? 'Active' : 'Hidden' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $car->fleet_position }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $cars->links('livewire.partials.pagination') }}
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No cars found</h5>
                </div>
            @endif
        </div>
    </div>
</div>
