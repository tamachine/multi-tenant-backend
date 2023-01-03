<div class="shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg p-10">
    <div class="text-xl text-green-700 font-bold">
        Extras purchased in the bookings
    </div>

    <div id="extras_chart" style="height:600px;"></div>
</div>

<div class="mt-4 shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg p-10">
    <div class="text-xl text-green-700 font-bold">
        Most extras/insurances purchased
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
                        Category
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($extras as $index => $extra)
                    <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="w-4 h-4 rounded-full"
                                style="background:{{$colors->get($extra->vendor_id)}}"
                            ></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            {{ json_decode($extra->name, true)["en"] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            {{ $extra->vendor_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $extra->number }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $extra->category == 'insurance' ? 'Insurance' : 'Extra'}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
