<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <x-admin.search />

            @if ($pages->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Route') }}
                                </th>         
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Description') }}
                                </th>   
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Link') }}
                                </th>                        
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pages as $index => $page)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">                                    
                                    <td class="px-6 py-4 text-sm font-medium">     
                                        <a href="#" class="text-purple-700 hover:underline">
                                            {!! highlightTerm($page->route_name, $search) !!}                                                                                                             
                                        </a>
                                    </td>                                      
                                    <td class="px-6 py-4 text-sm font-medium">     
                                        {!! highlightTerm($page->description, $search) !!}                                                                                 
                                    </td>      

                                    <td class="px-6 py-4 text-sm font-medium">             
                                        <a href="{{ route($page->route_name) }}" target="_blank" class="text-purple-700 hover:underline">                                
                                            {{ route($page->route_name) }}
                                        </a>                                                                                                                                                     
                                    </td>    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $pages->links('livewire.partials.pagination') }}
                
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No pages found</h5>
                </div>
            @endif
        </div>
    </div>
</div>
