<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <x-admin.search />

            @if ($translations->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Name') }}
                                </th>
                                @foreach(config('languages') as $key => $language)
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $language }}
                                </th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($translations as $index => $translation)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    
                                    <td class="px-6 py-4 text-sm font-medium">     
                                        <a href="{{route('content.translation.edit', [ $translation, 'search' => $search ])}}" class="text-purple-700 hover:underline">
                                            {!! highlightTerm($translation->full_key, $search) !!}                                                                                                             
                                        </a>
                                    </td>

                                    @foreach(config('languages') as $key => $language)
                                    <td class="px-6 py-4 text-sm font-medium">                                                                                 
                                        {!! highlightTerm($translation->getTranslation($key), $search) !!}                                  
                                    </td>
                                    @endforeach                            
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $translations->links('livewire.partials.pagination') }}
                
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No translations found</h5>
                </div>
            @endif
        </div>
    </div>
</div>
