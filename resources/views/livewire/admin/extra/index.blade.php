<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <!-- Vendor filter -->
            @if (!$oneVendor)
                <div>
                    <select id="vendor" name="vendor" wire:model="vendor"
                        class="disable-arrow block w-auto h-10 mt-1 pt-2 pl-3 pr-10 text-left border-gray-300 rounded-md"
                    >
                        <option value="">All vendors</option>
                        @foreach ($vendors as $id => $name)
                            <option value="{{$id}}">{{ $name }}</option>
                        @endforeach
                    </select>

                    <x-admin.input-help value="{{ __('Select a vendor to reorder the extras') }}" />
                </div>
            @endif

            <x-admin.search />

            @if ($extras->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order
                                </th>
                                @if ($vendor != "" && $search == "")
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                    </th>
                                @endif
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Vendor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Source
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($extras as $index => $extra)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="w-20 px-6 py-2 whitespace-nowrap">
                                        <div class="w-16 text-center text-shadow"
                                            style="background:{{$extra->brand_color}}"
                                        >
                                            {{($page - 1) * perPage() + $index + 1}}
                                        </div>
                                    </td>

                                    @if ($vendor != "" && $search == "")
                                        <td class="w-10">
                                            @if ($index > 0)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-700 cursor-pointer"
                                                    wire:click="moveExtra('{{$extra->hashid}}', true)"
                                                >
                                                    <path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </td>

                                        <td class="w-10">
                                            @if ($index < $count - 1)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-700 cursor-pointer"
                                                    wire:click="moveExtra('{{$extra->hashid}}', false)"
                                                >
                                                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </td>
                                    @endif

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{route('intranet.extra.edit', $extra->hashid)}}" class="text-purple-700 hover:underline">
                                            {{ $extra->name }}
                                        </a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $extra->vendor_name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $extra->active ? 'Active' : 'Hidden' }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $extra->caren_id ? 'Caren' : 'Own' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No extras found</h5>
                </div>
            @endif
        </div>
    </div>
</div>
