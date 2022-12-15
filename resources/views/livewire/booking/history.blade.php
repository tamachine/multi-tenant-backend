<div class="flex flex-col p-4 sm:p-10">
    @include('livewire.booking.partial.history-filters')

    <div class="mt-4 shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg overflow-x-auto">
        @if ($bookings->count())
            <div class="p-4">
                <div class="sm:flex sm:justify-between sm:items-center">
                    <div class="mt-4 flex justify-start">
                        <!-- Records -->
                        <div class="px-4">
                            <x-admin.label for="records" value="{{ __('Records') }}" />

                            <select id="records" name="records" wire:model="records"
                                class="disable-arrow block w-full mt-2 pt-2 pl-3 pr-10 text-left border-gray-300 rounded-md"
                            >
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>

                        <!-- Date Format -->
                        <div class="ml-4 px-4">
                            <x-admin.label for="date_format" value="{{ __('Date format') }}" />

                            <select id="date_format" name="date_format" wire:model="date_format"
                                class="disable-arrow block w-full mt-2 pt-2 pl-3 pr-10 text-left border-gray-300 rounded-md"
                            >
                                <option value="d-m-Y H:i">Europe</option>
                                <option value="Y-m-d H:i">USA</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button class="inline-flex items-center px-4 py-2 bg-green-900 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-white hover:border-green-900 hover:text-green-900 active:bg-white active:border-green-900 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                            type="button"
                            wire:click="excelExport"
                        >
                            Excel
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                <x-admin.order-table
                                    name="Order Id"
                                    order_column="{{$order_column}}"
                                    order_way="{{$order_way}}"
                                    column="order_number"
                                />
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
                                        {{ $booking->order_number }}
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
