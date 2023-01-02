<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <!-- Filters -->
            <div class="sm:flex sm:justify-start">
                <select id="faq_category" name="faq_category" wire:model="faq_category"
                    class="disable-arrow block h-10 mt-4 sm:mt-0 pt-2 pl-3 pr-10 text-left border-gray-300 rounded-md"
                >
                    <option value="">All FAQ Categories</option>
                    @foreach($categories as $faqCategory)
                        <option value="{{$faqCategory->id}}">{{ $faqCategory->name }}</option>
                    @endforeach
                </select>                
            </div>

            <x-admin.search />

            @if ($faqs->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Question') }}
                                </th>   
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Answer') }}
                                </th>   
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Categories') }}
                                </th>                              
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($faqs as $index => $faq)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">                                    
                                    <td class="px-6 py-4 text-sm font-medium">     
                                        <a href="{{route('content.faq.edit', [ $faq, 'search' => $search ])}}" class="text-purple-700 hover:underline">
                                            {!! highlightTerm($faq->question, $search) !!}                                                                                                             
                                        </a>
                                    </td>   
                                    <td class="px-6 py-4 text-sm font-medium">                                             
                                        {!! highlightTerm($faq->answer, $search) !!}                                                                                                                                                     
                                    </td>   
                                    <td class="px-6 py-4 text-sm font-medium">    
                                        @if($faq->faqCategories->count() > 0)
                                            {!! implode(", ", $faq->faqCategories->pluck('name')->toArray()) !!}
                                        @else
                                            <span class="text-red-600">{{ __('No categories') }}</span>
                                        @endif
                                    </td>                                                        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $faqs->links('livewire.partials.pagination') }}
                
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No faqs found</h5>
                </div>
            @endif
        </div>
    </div>
</div>
