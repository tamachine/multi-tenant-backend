<x-admin.form-section submit="dummy" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @if (count($dates))
            <div class="mt-8 md:mt-0 shadow overflow-x-auto border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="border-b border-gray-200">
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Start Date
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                End Date
                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                            </th>

                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($dates as $key => $record)
                            <tr class="{{$key % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <x-admin.date-picker
                                        name="start_date_{{ $key }}"
                                        placeholder="Click to select date"
                                        :yearRange="[
                                            now()->format('Y'),
                                            now()->addYears(2)->format('Y')
                                        ]"
                                        autocomplete="off"
                                        is-wire="true"
                                        variable="dates.{{$key}}.start_date"
                                    />
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <x-admin.date-picker
                                        name="end_date_{{ $key }}"
                                        placeholder="Click to select date"
                                        :yearRange="[
                                            now()->format('Y'),
                                            now()->addYears(2)->format('Y')
                                        ]"
                                        autocomplete="off"
                                        is-wire="true"
                                        variable="dates.{{$key}}.end_date"
                                    />
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <button class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                                        type="button"
                                        wire:click="editDate({{$key}})"
                                    >
                                        Edit
                                    </button>
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap">
                                    <button class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                                        type="button"
                                        wire:click="deleteDate({{$key}})"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white shadow mt-8 md:mt-0 px-4 py-5 sm:rounded-lg sm:p-6">
                <h5>This car has no unavailable dates yet.</h5>
            </div>
        @endif
    </x-slot>
</x-admin.form-section>
