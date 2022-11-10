<div class="flex flex-col md:flex-row-reverse gap-5">
    <div class="flex flex-col gap-5 flex-1">
        <img class="object-cover rounded-xl" src="{{ asset('images/home/why-iceland-1.png') }}" />
        <div class="grid grid-cols-2 gap-5">
            <img class="object-cover rounded-xl w-full" src="{{ asset('images/home/why-iceland-2.png') }}" />
            <img class="object-cover rounded-xl w-full" src="{{ asset('images/home/why-iceland-3.png') }}" />
        </div>
    </div>
    <div x-data="{showButton: true}" class="bg-[#fdeef4] rounded-xl px-7 py-12 md:px-12 md:py-24 flex-1 md:overflow-auto md:max-h-full">
        <h2> {!! __('web.home.why-iceland-title') !!}</h2>
        <p class="pt-6 md:pt-9 line-clamp-6 md:line-clamp-none md:text-base text-lg" :class="{ 'line-clamp-none': !showButton }">
            {!! __('web.home.why-iceland-text') !!}
        </p>
        <div x-on:click="showButton= false" x-show="showButton" class="md:hidden bg-[#fdeef4] pt-6 cursor-pointer font-medium">
            {!! __('web.home.why-iceland-more') !!} <img class="inline" src="{{ asset('images/icons/read-more.svg') }}" />
        </div>
    </div>    
</div>

