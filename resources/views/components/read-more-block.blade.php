<div x-data="{showReadMore: true}">
    <p class="{{ $lineClampTailwindClass }} md:line-clamp-none md:text-base md:leading-[30px] text-lg md:{{ $textAlignDesktop }}" :class="{ 'line-clamp-none': !showReadMore }">
    {!! $text !!}
    </p>
    <div x-on:click="showReadMore= false" x-show="showReadMore" class="md:hidden pt-6 cursor-pointer font-medium">
        {!! __('web.general.read-more') !!} <img class="inline" src="{{ asset('images/icons/read-more.svg') }}" />
    </div>
</div>