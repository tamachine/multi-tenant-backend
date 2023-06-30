<div 
    id="calendar" 
    class="searchbar-popover absolute w-full pointer-events-none"
    x-cloak 
    x-show="openCalendar"    
    >
    
    <div                 
        id="calendar__layer"
        class="searchbar-popover__layer max-w-5xl w-full md:w-[90%] pt-8 pb-4 md:pb-8 overflow-hidden
        before:content-[''] before:md:content-none before:absolute before:top-[32px] before:left-0 before:w-full before:h-[20px] before:bg-gradient-to-b before:from-white before:to-transparent before:z-10 before:pointer-events-none
        after:content-[''] after:md:content-none after:absolute after:bottom-[68px] after:left-0 after:w-full after:h-[20px] after:bg-gradient-to-b after:from-transparent after:to-white after:z-10 after:pointer-events-none
        "
        >

        {{-- Mobile: go back --}}
        <x-back-popover click="backShowDate()" />
        
        {{-- Mobile: close button --}}
        <x-close-popover />
        
        {{-- Calendar and Time picker: Mobile and desktop --}}
        <x-datepicker-range />

        <x-timepicker-range />

        {{-- Mobile: show layer default pickup and return time and location --}}
        <div :class="showDefault ? '' : 'hidden'"
            class="absolute top-0 left-0 w-full h-full flex items-center justify-center z-20">

            <div x-on:click="openCalendarClick()" class="absolute top-0 left-0 w-full h-full bg-black/50 z-0"></div>

            <div
                class="relative min-w-[85%] max-w-[99%] bg-white rounded-md p-5 shadow-[0_-6px_13px_0_rgba(0,0,0,0.25)]">
                <h3 class=" font-fredoka-medium text-pink-red text-xl leading-tight text-center mb-5">{!! __('car-search-bar.mobile-default-title') !!}</h3>
                <div class="grid grid-cols-2 gap-3 text-black mb-6 font-sans-medium">
                    <div class=" text-center">
                        <p class="flex items-center justify-center gap-0.5 text-3xl leading-none">
                            12:00 <span class="text-sm">AM</span></p>
                        <p class="text-black text-xs">{!! __('car-search-bar.mobile-default-times-title') !!}</p>
                    </div>
                    <div class=" text-center">
                        <p class="flex items-center justify-center gap-0.5 text-3xl leading-none">
                            KEF <span class="text-sm uppercase">{!! __('car-search-bar.mobile-default-location-airport') !!}</span></p>
                        <p class="text-black text-xs">{!! __('car-search-bar.mobile-default-location-title') !!}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    {{-- Edit button --}}
                    <button x-on:click="editDefault()"
                        class=" btn btn-border border-black text-lg px-4 py-2">{!! __('car-search-bar.mobile-edit-button') !!}</button>

                    {{-- Search button --}}
                    {{-- Falta funcionalidad enviar formulario --}}
                    <button class="btn btn-red px-4 py-2">{!! __('car-search-bar.mobile-continue-button') !!}</button>
                </div>
            </div>
        </div>

        {{-- Mobile: edit pickup and return time and location --}}
        <div :class="showResume ? '' : 'hidden'" class="h-full">
            <div id="resume" class="flex flex-col justify-between h-full">
                <div class="overflow-auto p-5 sm:px-10">
                    <h3 class="font-fredoka-medium text-[28px] text-center mb-7">{!! __('car-search-bar.mobile-resume-title') !!}</h3>
                    <div id="resume-dates" class="mb-10">
                        <div class="flex items-center gap-1.5 mb-3">
                            <img src="{{ asset('images/icons/calendar.svg') }}" />
                            <h3 class="font-fredoka-medium text-lg text-black">{!! __('car-search-bar.mobile-dates-title') !!}</h3>
                        </div>
                        <div>
                            <div x-on:click="backShowDate()" 
                                id="resume-mobile-dates"
                                class="mobile-dates search-input-group flex bg-white">
                                @foreach ($ranges as $range)
                                    <div class='search-input-set'>
                                        <div class="search-info">
                                            <div class="search-input-label">
                                                <label for="{{ $range }}-date">{!! __('car-search-bar.resume-' . $range . '-title') !!}</label>
                                            </div>
                                            <div class="hidden selected text-black">
                                                <div
                                                    class="flex flex-row items-stretch justify-center font-sans-medium gap-1">
                                                    <span id=""
                                                        class="{{ $range }}-day text-[36px] leading-[0.8em]"></span>
                                                    <div class="flex flex-col justify-between items-center">
                                                        <span id=""
                                                            class="{{ $range }}-dayweek text-sm leading-none uppercase"></span>
                                                        <span id=""
                                                            class="{{ $range }}-month text-sm leading-none uppercase"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" class="{{ $range }}-date search-input"
                                            placeholder="{!! __('car-search-bar.' . $range . '-day-placeholder') !!}" readonly="readonly" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div id="resume-times" class="mb-10">
                        <div class="flex items-center gap-1.5 mb-3">
                            <img src="{{ asset('images/icons/time.svg') }}" />
                            <h3 class="font-fredoka-medium text-lg text-black">{!! __('car-search-bar.mobile-times-title') !!}</h3>
                        </div>
                        <div>
                            <div id="resume-mobile-times"
                                class="mobile-times search-input-group flex bg-white">
                                @foreach ($ranges as $range)
                                    <div id="search-input-{{ $range }}-hour"
                                        class="search-input-set active">
                                        <div class="search-info pointer-events-none">
                                            <div class="search-input-label">
                                                <label
                                                    for="hour-{{ $range }}">{!! __('car-search-bar.resume-' . $range . '-title') !!}</label>
                                            </div>
                                            <div class="resume-selected search-input">
                                                <span id="resume-time--{{ $range }}"
                                                    class="font-sans-medium text-xl">12:00</span>
                                                <span id="resume-type--{{ $range }}"
                                                    class="text-xs">AM</span>
                                            </div>
                                            <img class="select-arrow w-[8px] " src="{{ asset('images/icons/arrow-down-solid.svg') }}" />
                                        </div>
                                        <select id="{{ $range }}-hours-list"
                                            name="{{ $range }}-hours-list"
                                            for="'selected-time-{{ $range }}'">
                                            <x-hours-list />
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div id="resume-locations" class="mb-10">
                        <div class="flex items-center gap-1.5 mb-3">
                            <img src="{{ asset('images/icons/location.svg') }}" />
                            <h3 class="font-fredoka-medium text-lg text-black">{!! __('car-search-bar.mobile-location-title') !!}</h3>
                        </div>
                        <div>
                            <div id="resume-mobile-locations"
                                class="mobile-locations search-input-group flex bg-white">
                                @foreach ($ranges as $range)
                                    <div id="search-input-{{ $range }}-hour"
                                        class="search-input-set active">
                                        <div class="search-info pointer-events-none">
                                            <div class="search-input-label">
                                                <label
                                                for="hour-{{ $range }}">{!! __('car-search-bar.resume-' . $range . '-title') !!}</label>
                                            </div>
                                            <div class="resume-selected search-input">
                                                <span id="resume-location--{{ $range }}"
                                                class="w-full font-sans-medium text-xl text-ellipsis overflow-hidden">KEF Int</span>
                                            </div>
                                            <img class="select-arrow w-[8px] " src="{{ asset('images/icons/arrow-down-solid.svg') }}" />
                                        </div>
                                        <select id="{{ $range }}-locations-list"
                                            name="{{ $range }}-locations-list"
                                            for="'selected-location-{{ $range }}'">
                                            @foreach ($locations as $key => $location)
                                                <option value="{{ $location->name }}">
                                                    {{ $location->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-[80%] text-center mx-auto">
                    <button class="z-20 w-full btn btn-red px-16 py-3">{!! __('car-search-bar.mobile-continue-button') !!}</button>
                </div>
            </div>

        </div>
    </div>
</div>