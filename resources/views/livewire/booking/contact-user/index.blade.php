<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="pb-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
         
            <!-- Filters -->
            <div class="flex mb-6">
                <div class="flex flex-col">
                    <x-admin.label for="type" value="{{ __('Type') }}" />
                    <div class="sm:flex sm:justify-start mt-2">
                        <select id="type" name="type" wire:model="type"
                            class="disable-arrow block h-10 mt-4 sm:mt-0 pt-2 pl-3 pr-10 text-left border-gray-300 rounded-md"
                        >
                            <option value="" selected> All </option>
                            @foreach($this->typeOptions as $index => $typeOption)
                                <option value="{{$typeOption->hashid}}">{{ $typeOption->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <!-- Date -->
                <div class="pl-7">
                    <x-admin.label for="contact_date" value="{{ __('Contact date') }}" />
                    <div class="mt-2 flex justify-start items-center">
                    <x-admin.date-picker class="!w-26"
                        name="contact_start_date"
                        placeholder=""
                        :yearRange="[
                            now()->subYears(10)->format('Y'),
                            now()->addYears(3)->format('Y')
                        ]"
                        autocomplete="off"
                        is-wire="true"
                        variable="contact_start_date"
                    />

                    <div class="ml-2 font-semibold text-sm text-gray-700">
                        To
                    </div>

                    <div class="ml-2">
                        <x-admin.date-picker
                            name="contact_end_date"
                            placeholder=""
                            :yearRange="[
                                now()->subYears(10)->format('Y'),
                                now()->addYears(3)->format('Y')
                            ]"
                            autocomplete="off"
                            is-wire="true"
                            variable="contact_end_date"
                        />
                    </div>
                </div> 
            </div>    
        </div>

        <div class="flex">
            <x-admin.search />
            <span class="font-medium text-gray-500 self-end" style="align-self:end;"> Num of results: {{$contactUsers->count()}}</span>  
        </div>
            

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
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    <x-admin.order-table
                                        name="Created_at"
                                        order_column="{{$order_column}}"
                                        order_way="{{$order_way}}"
                                        column="created_at"
                                    />
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
                                        {{-- {{ json_decode($contactUsers[$index]->typeDescription)->en}} --}}
                                        {{$contactUser->typeDescription}}
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