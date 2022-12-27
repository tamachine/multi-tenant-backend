<div class="mt-4 bg-white p-4 sm:p-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <h1 class="text-lg text-green-700 font-bold cursor-pointer hover:underline"
        @click.prevent="info == 'insurances' ? info = '' : info = 'insurances'"
    >
        Insurances
    </h1>

    <table x-show="info == 'insurances'"
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
            </tr>
        </thead>

        @foreach ($caren_info["Insurances"] as $index => $insurance)
            <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $insurance["Name"] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $insurance["Id"] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $insurance["TotalPrice"] }}
                </td>
            </tr>
        @endforeach
    </table>
</div>
