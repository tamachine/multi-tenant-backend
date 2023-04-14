<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            
            @if ($newsletterUsers->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>                               
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>                                
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Updated
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Active
                                </th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                </th>
                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($newsletterUsers as $index => $newsletter_user)                               
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">                                    
                                    <td class="px-6 py-4 text-sm font-medium">                                             
                                        {{$newsletter_user->email}}                                                                                                                                                    
                                    </td>                                        

                                    <td class="px-6 py-4 text-sm font-medium">                                             
                                        {{$newsletter_user->created_at->format('d-m-Y H:s')}}                                                                                                                                                    
                                    </td>  

                                    <td class="px-6 py-4 text-sm font-medium">                                             
                                        {{$newsletter_user->updated_at->format('d-m-Y H:s')}}                                                                                                                                                    
                                    </td>  

                                    <td class="px-6 py-4 text-sm font-medium">                                                                                           
                                        <label for="active_{{ $index }}" class="inline-flex items-center">
                                            <x-admin.checkbox id="active_{{ $index }}" wire:model.defer="users.{{ $index }}.active" />
                                        </label>                                                                                                                                             
                                    </td>  
                                    
                                    <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                                        <button class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                                            type="button"
                                            wire:click="saveNewsletterUser({{$index}})"
                                        >
                                            Save
                                        </button>
                                    </td>

                                    <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                                        <x-admin.delete-item
                                            trigger="Delete"
                                            title="Delete user"
                                            class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                                            name="{{ $newsletter_user['email'] }}"
                                            hashid="{{ $newsletter_user['hashid'] }}"
                                        />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $newsletterUsers->links('livewire.partials.pagination') }}
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No newsletter users found</h5>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('delete-element', event => {
            @this.call('deleteNewsletterUser', event.detail.hashid)
        });
    </script>
@endpush

