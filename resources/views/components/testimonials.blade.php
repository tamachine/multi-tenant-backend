<div class="flex flex-col md:flex-row gap-7 pt-32 relative">
    <h2 class="text-center md:px-10 md:hidden">{!! __('home.testimonials-title') !!}</h2>     
    <div class="md:absolute md:top-[158px] md:left-1/2 md:-translate-x-1/2 w-4/5 md:w-64 mx-auto z-10">
            @include('components.testimonials-slide')
    </div>
    <div class="grid grid-cols-2 gap-2 justify-between relative md:flex-1 -mt-16 md:mt-0">        
        <img class="rounded-2xl w-full" src="{{ asset('images/home/testimonials-left.png') }}" />
        <img class="rounded-2xl w-full" src="{{ asset('images/home/testimonials-right.png') }}" />
    </div>
    <div class="md:flex-1 md:flex md:flex-col md:justify-end md:items-end">
        <h2 class="hidden md:block text-center px-10 md:px-0 md:text-right md:pl-24 md:pr-9">{!! __('home.testimonials-title') !!}</h2>   
        <div class="leading-[30px] md:text-right md:pl-24 md:pt-3 md:pr-9">
            {!! __('home.testimonials-text') !!}
        </div>
        <button class="tab hidden md:block md:mt-3 md:mr-9">{!! __('home.testimonials-all') !!}</button>
    </div>
</div>
