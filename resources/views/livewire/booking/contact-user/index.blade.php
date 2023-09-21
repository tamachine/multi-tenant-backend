<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <!-- Filters -->
            <div class="sm:flex sm:justify-start">
                <select id="order" name="order" wire:model="type"
                    class="disable-arrow block h-10 mt-4 sm:mt-0 pt-2 pl-3 pr-10 text-left border-gray-300 rounded-md"
                >
                    <option value="" selected> All </option>
                    @foreach(config('contact.enquiry_types') as $typeOption)
                        <option value="{{$typeOption}}">{{ $typeOption }}</option>
                    @endforeach
                </select>
            </div>

            <x-admin.search />

            @if ($contactUsers->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>                              
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    EMAIL
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    TYPE
                                </th>
                                <th scope="col" class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    SUBJECT
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    CREATED
                                </th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($contactUsers as $index => $contactUser)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{route('intranet.booking.contact-users.edit', $contactUser)}}" class="text-purple-700 hover:underline">
                                            {{ $contactUser->email }}  
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $contactUser->type }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $contactUser->subject }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $contactUser->created_at}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $contactUsers->links('livewire.partials.pagination') }}
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No contact users found</h5>
                </div>
            @endif
        </div>
    </div>
</div>