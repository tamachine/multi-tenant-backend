<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <x-admin.search />

            @if ($vendors->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Color
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($vendors as $index => $vendor)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-4 h-4 rounded-full"
                                            style="background:{{$vendor->brand_color}}"
                                        ></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{route('intranet.vendor.edit', $vendor->hashid)}}" class="text-purple-700 hover:underline">
                                            {{ $vendor->name }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ ucfirst($vendor->status) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $vendors->links('livewire.partials.pagination') }}
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No vendors found</h5>
                </div>
            @endif
        </div>
    </div>
</div>
