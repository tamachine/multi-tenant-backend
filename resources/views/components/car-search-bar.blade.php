@php
    $ranges = ['start', 'end'];
@endphp


<div x-data="carSearchBar()" class="relative">
    <div x-show="showOverlay" x-on:click="closePopOver()"
        class="fixed h-screen w-screen top-0 left-0 bg-black bg-opacity-50 backdrop-blur-sm" x-cloak></div>

    @foreach ($locations as $key => $location)
    @endforeach

    <div class="max-w-6xl px-3 xl:px-0 mx-auto">
        <form :class="openCalendar ? 'md:shadow-t-xl' : 'md:shadow-xl'" id="search-bar"
            class="relative 
            
            bg-white rounded-3xl font-medium text-black-secondary 
            md:border-[3px] md:border-pink-red"
            autocomplete="off">

            {{-- Este input hay que ponerlo para deshabilitar la opción de autocompletado --}}
            <input autocomplete="false" name="hidden" type="text" class="hidden">

            <div class="flex gap-4 flex-col md:flex-row lg:gap-6 items-stretch p-3 lg:p-5">

                {{-- DESKTOP --}}
                <div class="hidden md:flex gap-5 lg:gap-8 grow">
                    <div id="set-dates" class="search-input-group flex gap-2 basis-[32%] lg:basis-[30%]"
                        x-on:click="openCalendarClick()">
                        @foreach ($ranges as $range)
                            <x-selected-date size="desktop" range="{{ $range }}" />
                        @endforeach
                    </div>
                    <div id="set-times" class="search-input-group flex gap-2 basis-[21%]" x-on:click="openTimeClick()">
                        <div class="search-input-set">
                            <div class="search-input-label">
                                <label for="hour-start">{!! __('car-search-bar.time') !!}</label>
                            </div>
                            <input type="text" class="search-input" id="hour-start" placeholder="12 AM"
                                readonly="readonly" />
                        </div>
                        <div class="search-input-set">
                            <div class="search-input-label">
                                <label for="hour-end">{!! __('car-search-bar.time') !!}</label>
                            </div>
                            <input type="text" class="search-input" id="hour-end" placeholder="12 AM"
                                readonly="readonly" />
                        </div>
                    </div>
                    <div id="set-locations" class="search-input-group flex gap-2 basis-[41%] lg:basis-[44%]"
                        x-on:click="openLocationsClick()">
                        <div class="search-input-set">
                            <div class="search-input-label">
                                <label for="pickup-location">{!! __('car-search-bar.pick-up-location') !!}</label>
                            </div>
                            <input type="text" class="search-input text-sm" id="pickup-location"
                                placeholder="Keflavik Airport" readonly="readonly" />
                        </div>
                        <div class="search-input-set">
                            <div class="search-input-label">
                                <label for="return-location">{!! __('car-search-bar.return-location') !!}</label>
                            </div>
                            <input type="text" class="search-input text-sm" id="return-location"
                                placeholder="Keflavik Airport" readonly="readonly" />
                        </div>
                    </div>
                </div>

                {{-- MOBILE --}}
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

                {{-- BUTTON --}}
                <div class="flex items-stretch">
                    {{-- Desktop --}}
                    <x-search-button id="search__button" :disabled="true" class="hidden md:inline-block" />

                    {{-- Mobile --}}
                    <x-search-button id="mobile-search__button" :disabled="false" class="md:hidden" />
                </div>
            </div>

        </form>
    </div>

    <div id="calendar" class="searchbar-popover absolute w-full pointer-events-none"
        :class="openCalendar ? '' : 'hidden'" x-cloak>
        <div id="calendar__layer"
            class="searchbar-popover__layer max-w-5xl w-full md:w-[90%] pt-8 pb-4 md:pb-10 overflow-hidden
        before:content-[''] before:md:content-none before:absolute before:top-[32px] before:left-0 before:w-full before:h-[20px] before:bg-gradient-to-b before:from-white before:to-transparent before:z-10 before:pointer-events-none
        after:content-[''] after:md:content-none after:absolute after:bottom-[68px] after:left-0 after:w-full after:h-[20px] after:bg-gradient-to-b after:from-transparent after:to-white after:z-10 after:pointer-events-none
        ">
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
                    <div class="grid grid-cols-2 gap-3 text-black mb-6">
                        <div class=" text-center">
                            <p class="flex items-center justify-center gap-0.5 font-sans-medium text-3xl leading-none">
                                12:00 <span class="text-sm">AM</span></p>
                            <p class="text-gray-light text-xs">{!! __('car-search-bar.mobile-default-times-title') !!}</p>
                        </div>
                        <div class=" text-center">
                            <p class="flex items-center justify-center gap-0.5 font-sans-medium text-3xl leading-none">
                                KEF <span class="text-sm uppercase">{!! __('car-search-bar.mobile-default-location-airport') !!}</span></p>
                            <p class="text-gray-light text-xs">{!! __('car-search-bar.mobile-default-location-title') !!}</p>
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

    <div id="locations" class="searchbar-popover absolute w-full hidden md:block pointer-events-none"
        :class="{
            'show': showLocations,
            '!h-0': !showLocations,
            'different-location': differentLocation,
            'same-location': !differentLocation
        }"
        x-cloak>
        <div id="locations__layer"
            class="searchbar-popover__layer w-full md:w-[85%] max-w-4xl px-[4%] pt-10 pb-4 md:pb-6 ">
            {{-- Location: desktop --}}
            <x-selector-location :locations="$locations" />
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function carSearchBar() {
            return {
                openCalendar: false,
                showDate: false,
                showLocations: false,
                showDefault: false, // mobile default time and location
                showResume: false, // edit default information
                differentLocation: false,
                showBack: false,

                openCalendarClick() {
                    this.openCalendar = true
                    this.showDate = true
                    this.$refs.startDateButton.click()
                    this.showLocations = false
                    this.showBack = false
                    this.showDefault = false

                    if (vWidth <= 767) {
                        noScroll()
                    }

                    if (vWidth > 767) {
                        this.showOverlay = true
                        scrollToCalendar()
                    }
                },

                openTimeClick() {
                    this.openCalendar = true
                    this.showDate = true
                    this.$refs.startDateButton.click()
                    this.showLocations = false
                    this.showBack = false

                    if (vWidth <= 767) {
                        noScroll()
                    }

                    if (vWidth > 767) {
                        this.showOverlay = true
                        scrollToTimes()
                    }
                },

                openLocationsClick() {
                    this.showLocations = true
                    this.openCalendar = false
                    this.showBack = true
                    this.showOverlay = true
                    this.showBack = false
                    locationsOpenTransition();
                    setTimeout(startLocationToggle, 1);
                },

                openOverlay() {
                    if (vWidth > 767) {
                        this.showOverlay = true
                    } else {
                        this.showOverlay = false
                    }
                },

                closePopOver() {
                    this.openCalendar = false
                    this.showDate = false
                    this.showLocations = false
                    this.showOverlay = false
                    this.showBack = false
                    this.modalOpen = false

                    if (vWidth <= 767) {
                        normalScroll()
                    }
                },

                toggleLocation() {
                    this.differentLocation = !this.differentLocation,

                        toggleLocation()
                },

                continueToDefault() {
                    this.showDate = true
                    this.showBack = true
                    this.showDefault = true
                    this.showResume = false
                },

                editDefault() {
                    this.showResume = true
                    this.showDate = false
                    this.showDefault = false
                    this.showBack = true
                },

                backShowDate() {
                    this.showDate = true
                    this.showBack = false
                    this.showDefault = false
                    this.showResume = false
                },
            }
        }


        /********************
           POSITION POPOVER DEPENDING ON SPACE (Top or bottom car-search-bar)
        ********************/

        const searchBar = document.querySelector('#search-bar');
        let searchBarPositions;
        let spaceTop;
        let windowHeight;
        let spaceBottom;
        let scrollTop;
        let positionTop;

        const getPositionVariables = () => {
            searchBarPositions = searchBar.getBoundingClientRect();
            spaceTop = searchBarPositions.top;
            windowHeight = window.innerHeight;
            spaceBottom = windowHeight - searchBarPositions.bottom;
            scrollTop = window.pageYOffset;
            positionTop = spaceTop + scrollTop
        }

        const position = () => {
            getPositionVariables()

            const searchbarPopovers = document.querySelectorAll('.searchbar-popover');

            searchbarPopovers.forEach(searchbarPopover => {
                if (positionTop < 630) {
                    // El calendario no cabe arriba
                    searchbarPopover.classList.add('position-top');
                    searchbarPopover.classList.remove('position-bottom');
                } else {
                    if (spaceTop <= spaceBottom) {
                        // Más espacio abajo
                        searchbarPopover.classList.add('position-top');
                        searchbarPopover.classList.remove('position-bottom');
                    } else {
                        searchbarPopover.classList.remove('position-top');
                        searchbarPopover.classList.add('position-bottom');
                    }
                }
            });
        }

        window.addEventListener('load', position);
        window.addEventListener('scroll', position);
        window.addEventListener('resize', position);


        const scrollToCalendar = () => {
            getPositionVariables()

            if (positionTop < 630) {
                searchBar.scrollIntoView()
            }
        }

        const scrollToTimes = () => {
            // Si la selección de horas no aparece en pantalla se hace un pequeño scroll
            if (windowHeight < 610) {
                let scrollMovement = 700 - windowHeight
                window.scrollBy(0, scrollMovement)
            }
        }



        /********************
           TRANSITION HEIGHT CALENDAR
        ********************/

        function calendarHeight() {
            const calendarLayer = document.getElementById('calendar__layer');
            const calendar = document.getElementById('calendar');

            let calendarLayerHeight = calendarLayer.offsetHeight;

            calendar.style.height = calendarLayerHeight + 'px';
        }

        new ResizeObserver(calendarHeight).observe(calendar__layer);



        /********************
           TRANSITION HEIGHT LOCATIONS
        ********************/

        // Transition on toggle change
        function locationsHeight() {
            const locationsLayer = document.getElementById('return__layer');
            const locations = document.getElementById('select-return-location');

            let locationsLayerHeight = locationsLayer.offsetHeight;

            locations.style.height = locationsLayerHeight + 'px';
        }
        new ResizeObserver(locationsHeight).observe(return__layer);

        // Transition on open layer
        function locationsOpenTransition() {
            const locationsLayer = document.getElementById('locations__layer');
            const locations = document.getElementById('locations');

            let locationsLayerHeight = locationsLayer.offsetHeight;

            locations.style.height = locationsLayerHeight + 'px';

            setTimeout(function(){
                locations.style.height = 'auto'
            }, 200);
        }




        /********************
           No scroll when modal is open
        ********************/

        const body = document.querySelector('body');

        const noScroll = () => {
            body.classList.add('modal-open')
        }

        const normalScroll = () => {
            body.classList.remove('modal-open')
        }


        /********************
           Click on mobile search button
        ********************/
        const searchButtonMobile = document.getElementById('mobile-search__button')
        const searchBarMobile = document.getElementById('mobile-search-bar')

        const startInput = document.querySelectorAll('.start-date')
        const endInput = document.querySelectorAll('.end-date')

        searchButtonMobile.addEventListener('click', function(e) {
            if (startInput[0].value == '' || endInput[0].value == '') {
                e.preventDefault();
                searchBarMobile.click()
            } else {
                // ATENCIÓN: FALTA FUNCIÓN DE ENVIAR
                // Aquí irá la función de enviar formulario
                console.log('Enviar')
            }
        })


        /********************
           Click on mobile hours picker
        ********************/
        const startInputHour = document.getElementById('search-input-start-hour')
        const endInputHour = document.getElementById('search-input-end-hour')
        const startSelectHour = document.getElementById('start-hours-list')
        const endSelectHour = document.getElementById('end-hours-list')


        startInputHour.addEventListener('click', function(e) {
            e.preventDefault();
            startSelectHour.click()
        })

        endInputHour.addEventListener('click', function(e) {
            e.preventDefault();
            endSelectHour.click()
        })



        /******************
            SELECT TIME: select and show time selected on mobile
        ******************/

        const timeStart = {
            hoursList: document.getElementById('start-hours-list'),
            resumeTime: document.getElementById('resume-time--start'),
            resumeType: document.getElementById('resume-type--start')
        };

        const timeEnd = {
            hoursList: document.getElementById('end-hours-list'),
            resumeTime: document.getElementById('resume-time--end'),
            resumeType: document.getElementById('resume-type--end')
        };

        function showTimeValue(range) {
            const selectedOption = range.hoursList.options[range.hoursList.selectedIndex];
            const time = selectedOption.getAttribute('time');
            const type = selectedOption.getAttribute('type');

            range.resumeTime.innerHTML = time;
            range.resumeType.innerHTML = type;
        }

        timeStart.hoursList.addEventListener('change', () => showTimeValue(timeStart));
        timeEnd.hoursList.addEventListener('change', () => showTimeValue(timeEnd));



        /******************
            SELECT LOCATION: select and show time selected on mobile
        ******************/

        const locationStart = {
            locationsList: document.getElementById('start-locations-list'),
            resumeLocation: document.getElementById('resume-location--start'),
        };

        const locationEnd = {
            locationsList: document.getElementById('end-locations-list'),
            resumeLocation: document.getElementById('resume-location--end'),
        };

        function showLocationValue(range) {
            const selectedOption = range.locationsList.options[range.locationsList.selectedIndex];
            const location = selectedOption.getAttribute('value');

            range.resumeLocation.innerHTML = location;
        }

        locationStart.locationsList.addEventListener('change', () => showLocationValue(locationStart));
        locationEnd.locationsList.addEventListener('change', () => showLocationValue(locationEnd));
    </script>
@endpush
