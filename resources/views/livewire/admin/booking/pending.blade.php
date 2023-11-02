<div class="p-4">
    <div class="mb-2 flex justify-between">
        <div class="text-xl text-red-700 font-bold">
            Pending bookings
            @if ($bookings->count())
                ({{$bookings->count()}})
            @endif
        </div>

        @if ($bookings->count())
            <button class="inline-flex items-center px-4 py-2 bg-green-900 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-white hover:border-green-900 hover:text-green-900 active:bg-white active:border-green-900 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                type="button"
                wire:click="excelExport"
            >
                Excel
            </button>
        @endif
    </div>

    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            @if ($bookings->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order Id
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pickup Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Payment
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Vendor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Car Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Booking Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Online
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Last Message
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Additional info
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bookings as $index => $booking)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{$booking->edit_url}}" class="text-purple-700 hover:underline">
                                            {{ $booking->order_id }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $booking->pickup_at->format('d-m-Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ ucfirst($booking->payment_status) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ ucfirst($booking->vendor_status) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $booking->car_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $booking->created_at->format('d-m-Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ formatPrice($booking->online_payment, "ISK") }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $booking->last_log }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $booking->additional_info }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No pending bookings</h5>
                </div>
            @endif
        </div>
    </div>
</div>
