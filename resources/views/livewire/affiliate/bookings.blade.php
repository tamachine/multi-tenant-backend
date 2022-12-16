<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

            @include('livewire.affiliate.partial.booking-options')

            <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                @if ($bookings->count())
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    Commission
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    Car
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    Booking Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    Pickup Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    Dropoff Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    Concluded
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bookings as $index => $booking)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ formatPrice($booking->affiliate_commission, "ISK") }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $booking->car_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $booking->created_at->format($date_format) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $booking->pickup_at->format($date_format) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $booking->dropoff_at->format($date_format) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-medium text-gray-900">
                                        {{ $booking->status == 'concluded' ? 'Yes' : 'No' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mb-8">
                        {{ $bookings->links('livewire.partials.pagination') }}
                    </div>
                @else
                    <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                        <h5>No bookings found</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
