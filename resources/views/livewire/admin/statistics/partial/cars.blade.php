<div class="shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg p-10">
    <div class="text-xl text-green-700 font-bold">
        Most booked cars (chart)
    </div>

    <div id="cars_chart"></div>
</div>

<div class="mt-4 shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg p-10">
    <div class="text-xl text-green-700 font-bold">
        Most booked cars (table)
    </div>

    <div class="mt-8 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                @foreach ($carBookings as $index => $carBooking)
                    <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="w-4 h-4 rounded-full"
                                style="background:{{$colors->get($carBooking->vendor_id)}}"
                            ></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            {{ $carBooking->car_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            {{ $carBooking->vendor_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $carBooking->number }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ formatPrice($carBooking->average_price, "ISK") }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ formatPrice($carBooking->average_commission, "ISK") }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ formatPrice($carBooking->total_commission, "ISK") }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ round($carBooking->average_days, 2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
