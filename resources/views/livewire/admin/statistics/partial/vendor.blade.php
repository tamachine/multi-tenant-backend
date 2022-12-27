<div class="shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg p-10">
    <div class="text-xl text-green-700 font-bold">
        Bookings per vendor
    </div>

    <div class="mt-8 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Vendor
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Bookings
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Average price
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Average commission
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Total commission
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Average days
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($vendorBookings as $index => $vendorBooking)
                    <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="w-4 h-4 rounded-full"
                                style="background:{{$colours->get($vendorBooking->vendor_id)}}"
                            ></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            {{ $vendorBooking->vendor_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $vendorBooking->number }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ formatPrice($vendorBooking->average_price, "ISK") }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ formatPrice($vendorBooking->average_commission, "ISK") }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ formatPrice($vendorBooking->total_commission, "ISK") }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ round($vendorBooking->average_days, 2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>