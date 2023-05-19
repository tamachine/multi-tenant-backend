{{-- 
    background-image url is set with the 'style' property because Tailwind does not allow arbitrary values to be computed from dynamic values:
    https://v2.tailwindcss.com/docs/just-in-time-mode
--}}

<div x-data="{ image: '{{ $image }}' }"
    class="flex flex-col bg-cover rounded-2xl text-white justify-between relative h-[495px]" 
    x-on:mouseenter="image= '{{ $hover }}'"
    x-on:mouseleave="image= '{{ $image }}'"      
>
    <x-background-hover-transition :image="$image" class="h-[495px] w-full bg-cover rounded-2xl"/>

    <x-background-hover-transition :image="$hover" class="h-[495px] w-full bg-cover rounded-2xl" />   

    <div class="absolute top-0 left-0 z-10 md:mx-6 mx-4 h-[495px]">
        <div class="flex flex-col h-full">
            <div class="flex-grow my-4 md:my-8">
                <x-reading-time-icon time="{{ $time }}" />
            </div>
            
            <div class="font-fredoka-semibold text-[32px] leading-[34px]">{{ $title }}</div>
            <div class="pb-9 pt-[10px] md:text-base text-lg font-sans-medium font-medium">{{ $text }}</div>
        </div>
    </div>
</div>