@props(['class', 'title'])

@if ($faqs)
    <div x-data="{ tab: '#tab1' }"> 
        @if (request()->routeIs('faq'))
            <div class="max-w-5xl mx-auto mb-10 md:mb-24">
                <h1 class="mb-6 capitalize">
                    {{ __('home.faqs-title') }}
                </h1>
                <h2 class="font-sans font-normal text-black text-center text-xl md:text-2xl leading-snug">
                    {{ __('home.faqs-subtitle') }}
                </h2>
            </div>
        @else
            <x-heading-h2
                title="{{ __('home.faqs-title') }}"
                subtitle="{{ __('home.faqs-subtitle') }}"
            />
        @endif
        

        @if ($categories)
            <div class="mb-10 md:mb-16 flex md:justify-center justify-start gap-2 md:gap-5 w-full {{ $categories->count() > 3 ? 'flex-wrap' : '' }} flex-nowrap overflow-auto scrollbar-none w-fill-screen md:w-full md:left-0 px-3">            
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
