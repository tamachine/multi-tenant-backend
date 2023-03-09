<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <x-admin.search />

            @if ($affiliates->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    <x-admin.order-table
                                        name="Name"
                                        order_column="{{$order_column}}"
                                        order_way="{{$order_way}}"
                                        column="name"
                                    />
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    <x-admin.order-table
                                        name="Commission"
                                        order_column="{{$order_column}}"
                                        order_way="{{$order_way}}"
                                        column="commission_percentage"
                                    />
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    <x-admin.order-table
                                        name="Total bookings in {{now()->year}}"
                                        order_column="{{$order_column}}"
                                        order_way="{{$order_way}}"
                                        column="total_bookings"
                                    />
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    <x-admin.order-table
                                        name="Concluded bookings in {{now()->year}}"
                                        order_column="{{$order_column}}"
                                        order_way="{{$order_way}}"
                                        column="concluded_bookings"
                                    />
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($affiliates as $index => $affiliate)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{route('intranet.booking.affiliate.edit', $affiliate->hashid)}}" class="text-purple-700 hover:underline">
                                            {{ $affiliate->name }}
                                        </a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $affiliate->commission_percentage }} %
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $affiliate->total_bookings }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $affiliate->concluded_bookings }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mb-8">
                    {{ $affiliates->links('livewire.partials.pagination') }}
                </div>
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No affiliates found</h5>
                </div>
            @endif
        </div>
    </div>
</div>
