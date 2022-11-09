@if ($faqs)
    <div x-data="{ tab: '#tab1' }"  class="py-36">
        <x-heading-h2 
            title="{{ __('web.home.faqs-title') }}" 
            subtitle="{{ __('web.home.faqs-subtitle') }}" 
        />

        @if ($categories)               
        <div class="pt-12 pb-3 flex justify-center gap-5 w-full">
            @foreach($categories as $category)     
                <button class="tab w-[136px] h-[50px] p-0" @click.prevent="tab='#tab{{ $category->id }}'" :class="{ 'active': tab == '#tab{{ $category->id }}' }">{{ $category->name }}</button>                                            
            @endforeach
        </div>
        @endif

        <div class="max-w-2xl m-auto">
            @foreach($categories as $category)             
                <div x-show="tab == '#tab{{ $category->id }}'" class="grid grid-cols-1 divide-y">             
                    @foreach($category->faqs as $faq)                  
                        <div class="py-9"><x-accordion question="{!! $faq->question !!}" answer="{!! $faq->answer !!}" /></div>                    
                    @endforeach                   
                </div>               
            @endforeach            

            <div class="flex justify-center py-3">
                <button class="tab">{{ __('web.home.faqs-view-all') }}</button>
            </div>          
        </div>
    </div>
@endif