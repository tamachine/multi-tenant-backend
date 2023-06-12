<div x-data="{showReadMore: true}">
@if($reverseTextAlign)
    <p class="line-clamp-6 md:line-clamp-none text-base md:leading-[30px] md:text-right" :class="{ 'line-clamp-none': !showReadMore }">
@else
    <p class="line-clamp-6 md:line-clamp-none text-base md:leading-[30px] md:text-left" :class="{ 'line-clamp-none': !showReadMore }">
@endif
    
    {!! $text !!}
    </p>
    <div x-on:click="showReadMore = !showReadMore" class="md:hidden pt-6 cursor-pointer font-sans-medium font-medium">
        <p x-show="showReadMore" class="inline">{!! __('general.read-more') !!} </p>
        <img x-show="showReadMore" class="inline" src="{{ asset($arrowOpen) }}" />

        <p x-show="!showReadMore" class="inline">{!! __('general.read-less') !!} </p>
        <img x-show="!showReadMore" class="inline" src="{{ asset($arrowClose) }}" />
    </div>
</div>