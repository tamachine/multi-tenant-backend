<div class="mt-4 bg-white p-4 sm:p-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <h1 class="text-lg text-green-700 font-bold cursor-pointer hover:underline"
        @click.prevent="info == '{{$data}}' ? info = '' : info = '{{$data}}'"
    >
        {{$title}}
    </h1>

    <table x-show="info == '{{$data}}'"
        x-transition.duration.500ms
        style="display:none;"
        class="mt-4 w-full divide-y divide-gray-200"
    >
        <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                    Property
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                    Caren Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                    Value
                </th>
            </tr>
        </thead>

        @php $i = 0; @endphp
        @foreach (config('caren.' . $data) as $key => $value)
            <tr class="{{$i % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $key }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ carenName($value) }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ carenValue($caren_info, $value) }}
                </td>
            </tr>
            @php $i++; @endphp
        @endforeach
    </table>
</div>
