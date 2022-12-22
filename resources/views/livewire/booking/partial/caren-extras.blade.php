<div class="mt-4 bg-white p-4 sm:p-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <h1 class="text-lg text-green-700 font-bold cursor-pointer hover:underline"
        @click.prevent="info == 'extras' ? info = '' : info = 'extras'"
    >
        Standard Extras
    </h1>

    <table x-show="info == 'extras'"
        x-transition.duration.500ms
        style="display:none;"
        class="mt-4 w-full divide-y divide-gray-200"
    >
        <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                    Id
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                    Total price
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                    Quantity
                </th>
            </tr>
        </thead>

        @foreach ($caren_info["Extras"] as $index => $extra)
            <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $extra["Name"] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $extra["Id"] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $extra["TotalPrice"] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $extra["Quantity"] }}
                </td>
            </tr>
        @endforeach
    </table>
</div>
