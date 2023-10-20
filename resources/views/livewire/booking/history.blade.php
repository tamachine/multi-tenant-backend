<div class="flex flex-col p-4 sm:p-10">
    @include('livewire.booking.partial.history-filters')

    <div class="mt-4 shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg overflow-x-auto">
        @if ($bookings->count())
            @include('livewire.booking.partial.history-options')

            <div class="mt-4">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Order ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                <x-admin.order-table
                                    name="Booking Date"
                                    order_column="{{$order_column}}"
                                    order_way="{{$order_way}}"
                                    column="created_at"
                                />
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Vendor
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Car
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Pickup location
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Dropoff location
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Payment Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Vendor Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                <x-admin.order-table
                                    name="Pickup Date"
                                    order_column="{{$order_column}}"
                                    order_way="{{$order_way}}"
                                    column="pickup_at"
                                />
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                <x-admin.order-table
                                    name="Dropoff Date"
                                    order_column="{{$order_column}}"
                                    order_way="{{$order_way}}"
                                    column="dropoff_at"
                                />
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                <x-admin.order-table
                                    name="Total Price"
                                    order_column="{{$order_column}}"
                                    order_way="{{$order_way}}"
                                    column="total_price"
                                />
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                First Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Last Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Affiliate
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->created_at->format($this->date_format) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->vendor_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->car_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->pickup_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->dropoff_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ ucfirst($booking->payment_status) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ ucfirst($booking->vendor_status) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->pickup_at->format($this->date_format) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->dropoff_at->format($this->date_format) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ formatPrice($booking->total_price, "ISK") }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->first_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->last_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $booking->affiliate_name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mb-8">
                {{ $bookings->links('livewire.partials.pagination') }}
            </div>
        @else
            <div class="p-4">
                <h5>No bookings found</h5>
            </div>
        @endif
    </div>
</div>
