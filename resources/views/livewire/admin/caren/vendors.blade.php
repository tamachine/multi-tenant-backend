<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <x-admin.search />

        @if ($vendors->count())
            <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Caren Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Caren ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Linked to
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($vendors as $index => $vendor)
                            <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    {{ $vendor->name }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    {{ $vendor->caren_rental_id }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @if ($vendor->vendor_id)
                                        <a href="{{$vendor->vendor->edit_url}}" target="_blank"
                                            class="text-purple-700 hover:underline"
                                        >
                                            {{$vendor->vendor->name}}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @if (!$vendor->vendor_id)
                                        <a
                                            href="{{route('vendor.create', $vendor->id)}}"
                                            class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                                        >
                                            Create vendor
                                        </a>
                                    @endif
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
