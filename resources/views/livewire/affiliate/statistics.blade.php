<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Booking Status
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                {{now()->year}}
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                Always
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                Pending
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{ $pendingThisYear }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{ $pendingAlways }}
                            </td>
                        </tr>

                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                Confirmed
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{ $confirmedThisYear }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{ $confirmedAlways }}
                            </td>
                        </tr>

                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                Concluded
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{ $concludedThisYear }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{ $concludedAlways }}
                            </td>
                        </tr>

                        <tr class="bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                Canceled
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{ $canceledThisYear }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{ $canceledAlways }}
                            </td>
                        </tr>

                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                Total
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{ $totalThisYear }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{ $totalAlways }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
