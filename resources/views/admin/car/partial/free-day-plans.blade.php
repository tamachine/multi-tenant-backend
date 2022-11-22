<div class="bg-white shadow sm:rounded-lg flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

            @if (count($currentPlans))
                <h3 class="text-lg font-medium text-gray-900">Current free day plans</h3>

                <div class="mt-8 shadow overflow-x-auto border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr class="border-b border-gray-200">
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Min Days
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Max Days
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Free Days
                                </th>

                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($currentPlans as $key => $record)
                                <tr class="{{$key % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        {{$record["name"]}}
                                    </td>

                                    <td class="px-4 py-2 whitespace-nowrap">
                                        {{$record["min_days"]}}
                                    </td>

                                    <td class="px-4 py-2 whitespace-nowrap">
                                        {{$record["max_days"]}}
                                    </td>

                                    <td class="px-4 py-2 whitespace-nowrap">
                                        {{$record["days_for_free"]}}
                                    </td>

                                    <td class="px-4 py-2 whitespace-nowrap">
                                        <x-admin.delete-item
                                            trigger="Delete"
                                            title="Delete free day plan"
                                            class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150"
                                            name="{{ $record['name'] }}"
                                            hashid="{{ $record['id'] }}"
                                            event="delete-plan"
                                        />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-white shadow mt-8 md:mt-0 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>This car has no free day plans yet.</h5>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('delete-plan', event => {
            @this.call('deletePlan', event.detail.hashid)
        });
    </script>
@endpush
