@props(['class', 'title'])

@if ($faqs)
    <div x-data="{ tab: '#tab1' }">        
        <x-heading-h2
            title="{{ __('home.faqs-title') }}"
            subtitle="{{ __('home.faqs-subtitle') }}"
        />

        @if ($categories)
            <div class="pt-12 pb-3 flex md:justify-center justify-start gap-5 w-full {{ $categories->count() > 3 ? 'flex-wrap' : '' }} flex-nowrap overflow-x-auto scrollbar-none">            
                @foreach($categories as $category)
                    <button class="tab w-[136px] h-[50px] p-0 flex-shrink-0 " @click.prevent="tab='#tab{{ $category->id }}'" :class="{ 'active': tab == '#tab{{ $category->id }}' }">{{ $category->name }}</button>
                @endforeach
            </div>
        @endif

        <div class="max-w-2xl m-auto">
            @foreach($categories as $category)
                <div x-show="tab == '#tab{{ $category->id }}'" class="grid grid-cols-1 divide-y">
                    @foreach($category->takeFaqs($take) as $faq)
                        <div class="py-4 md:py-9">
                            <x-accordion question="{!! $faq->question !!}" answer="{!! $faq->answer !!}" />
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="block md:hidden w-full border-t"></div>

            @if($showViewAllButton)
            <div class="flex justify-center py-7 md:py-3">
                <button class="tab">{{ __('home.faqs-view-all') }}</button>
            </div>
            @endif
        </div>
    </div>
@endif
