<div class="mt-4 shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg overflow-x-auto">
    <table class="w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                    Date
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                    User
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                    Message/Action
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($booking->logs()->with('user')->orderBy('id', 'desc')->get() as $index => $log)
                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $log->created_at->format('d-m-Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $log->user ? $log->user->name : "System" }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $log->message }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

