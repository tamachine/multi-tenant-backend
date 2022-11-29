<div class="bg-white shadow sm:rounded-lg flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

            @if (count($currentExtras))
                <h3 class="text-lg font-medium text-gray-900">Current extras</h3>

                <div class="mt-8 shadow overflow-x-auto border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr class="border-b border-gray-200">
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>

                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>

                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($currentExtras as $key => $record)
                                <tr class="{{$key % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        {{$key + 1}}
                                    </td>

                                    <td class="px-4 py-2 whitespace-nowrap">
                                        {{$record["name"]}}
                                    </td>

                                    <td class="px-4 py-2 whitespace-nowrap">
                                        <x-admin.delete-item
                                            trigger="Delete"
                                            title="Delete extra"
                                            class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                                            name="{{ $record['name'] }}"
                                            hashid="{{ $record['id'] }}"
                                            event="delete-extra"
                                        />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-white shadow mt-8 md:mt-0 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>This car has no extras yet.</h5>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('delete-extra', event => {
            @this.call('deleteExtra', event.detail.hashid)
        });
    </script>
@endpush
