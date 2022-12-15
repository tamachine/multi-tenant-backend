<div x-data="{showReadMore: true}">
@if($reverseTextAlign)
    <p class="line-clamp-6 md:line-clamp-none md:text-base md:leading-[30px] text-lg md:text-right" :class="{ 'line-clamp-none': !showReadMore }">
@else
    <p class="line-clamp-6 md:line-clamp-none md:text-base md:leading-[30px] text-lg md:text-left" :class="{ 'line-clamp-none': !showReadMore }">
@endif
    
    {!! $text !!}
    </p>
    <div x-on:click="showReadMore= false" x-show="showReadMore" class="md:hidden pt-6 cursor-pointer font-sans-medium font-medium">
        {!! __('general.read-more') !!} <img class="inline" src="{{ asset('images/icons/read-more.svg') }}" />
    </div>
</div>