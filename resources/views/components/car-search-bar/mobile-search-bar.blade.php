<div id="mobile-search-bar" class="md:hidden w-full" x-on:click="openCalendarClick()">
    <div id="mobile-empty-dates" class="search-input-set bg-gray-primary border-2 rounded-lg px-5">
        <div class="search-input-label text-left">
            <label>{!! __('car-search-bar.mobile-first-input-title') !!}</label>
        </div>
        <input type="text" class="search-input text-left p-0" placeholder="{!! __('car-search-bar.mobile-first-input-placeholder') !!}"
            readonly="readonly" />
    </div>
    <div id="mobile-dates"
        class="mobile-dates hidden search-input-group flex gap-2 basis-[32%] lg:basis-[30%] border-black bg-white">
        @foreach ($ranges as $range)
            <x-selected-date size="mobile" range="{{ $range }}" />
        @endforeach
    </div>
</div>