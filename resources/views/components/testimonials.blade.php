<div class="flex flex-col md:flex-row gap-7 pt-32 relative">
    <div class="hidden md:block md:absolute z-10 top-[158px] left-1/2 -translate-x-1/2 w-64">
            @include('components.testimonials-slide')
    </div>
    <h2 class="text-center px-10 md:hidden">{!! __('home.testimonials-title') !!}</h2>     
    <div class="grid grid-cols-2 gap-2 pt-28 md:pt-0 justify-between relative md:flex-1">        
        <img class="rounded-2xl w-full" src="{{ asset('images/home/testimonials-left.png') }}" />
        <img class="rounded-2xl w-full" src="{{ asset('images/home/testimonials-right.png') }}" />
        <div class="absolute z-10 md:hidden mx-12">
            @include('components.testimonials-slide')
        </div>
    </div>   
    <div class="md:flex-1 md:flex md:flex-col md:justify-end md:items-end">
        <h2 class="hidden md:block text-center px-10 md:px-0 md:text-right md:pl-24 md:pr-9">{!! __('home.testimonials-title') !!}</h2>   
        <div class="leading-[30px] md:text-right md:pl-24 md:pt-3 md:pr-9">
            {!! __('home.testimonials-text') !!}
        </div>
        <button class="tab hidden md:block md:mt-3 md:mr-9">{!! __('home.testimonials-all') !!}</button>
    </div>
</div>
