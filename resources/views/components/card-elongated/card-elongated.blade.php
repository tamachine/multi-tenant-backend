{{-- 
    background-image url is set with the 'style' property because Tailwind does not allow arbitrary values to be computed from dynamic values:
    https://v2.tailwindcss.com/docs/just-in-time-mode
--}}

<div x-data="{ image: '{{ $image }}' }"
    class="flex flex-col bg-cover rounded-2xl text-white justify-between relative h-[495px]" 
    x-on:mouseenter="image= '{{ $hover }}'"
    x-on:mouseleave="image= '{{ $image }}'"      
>    
    @include('components.card-elongated.background', ['image' => $image])
    
    @include('components.card-elongated.background', ['image' => $hover])    

    <div class="absolute top-0 left-0 z-10 md:mx-6 mx-4 h-[495px]">
        <div class="flex flex-col h-full">
            <div class="flex-grow">
                <div class="my-4 md:my-8 bg-white rounded-2xl py-1 px-[10px] w-fit">
                    <img class="inline" src="{{ asset('images/icons/clock-red.svg') }}" /> 
                    <span class="text-sm font-medium text-black-primary pl-1">{{ $time }}</span>
                </div>
            </div>
            
            <div class="font-fredokaOne text-[32px] font-semibold leading-[34px]">{{ $title }}</div>
            <div class="pb-9 pt-[10px] md:text-base text-lg font-medium">{{ $text }}</div>
        </div>
    </div>
</div>