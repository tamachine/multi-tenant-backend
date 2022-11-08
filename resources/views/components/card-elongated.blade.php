<div x-data="{ image: '{{ $image }}' }"
    class="flex flex-col bg-cover rounded-3xl text-white justify-between relative" 
    @mouseover="image= '{{ $hover }}'"
    @mouseout="image= '{{ $image }}'"      
>    
    <div class="absolute top-0 left-0 bottom-0 z-0" 
        x-show="image == '{{ $image }}'" 
        x-transition:enter="transition ease-out duration-500" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition ease-in duration-500" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0"
    >
            <img src="{{ $image }}" />
    </div>
    <div class="absolute top-0 left-0 bottom-0 z-0" 
        x-show="image == '{{ $hover }}'" 
        x-transition:enter="transition ease-out duration-500" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition ease-in duration-500" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0"
    >
            <img src="{{ $hover }}" />
    </div>

    <div class="absolute top-0 left-0 z-10 mx-6 h-[495px]">
        <div class="flex flex-col h-full">
            <div class="flex-grow">
                <div class="my-8 bg-white rounded-2xl py-1 px-[10px] w-fit">
                    <img class="inline" src="{{ asset('images/icons/clock.svg') }}" /> 
                    <span class="text-sm font-medium text-black-primary pl-1">{{ $time }}</span>
                </div>
            </div>
            
            <div class="font-fredokaOne text-[32px] font-semibold leading-[34px]">{{ $title }}</div>
            <div class="pb-9 pt-[10px]">{{ $text }}</div>
        </div>
    </div>
</div>