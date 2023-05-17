<div x-data="carSearchBar()" class="relative">
    <div x-show="showOverlay" x-on:click="closePopOver()" class="fixed h-screen w-screen top-0 left-0 bg-black bg-opacity-50 backdrop-blur-sm" x-cloak></div>

    @foreach($locations as $key => $location)
    @endforeach
    <form :class="openCalendar ? 'md:shadow-t-xl' : 'md:shadow-xl'"
          id="search-bar" class="relative 
          
          bg-white rounded-3xl max-w-6xl font-medium text-black-secondary 
          md:border-[3px] md:border-pink-red mx-3 xl:mx-auto" 
          autocomplete="off">

          {{-- Este input hay que ponerlo para deshabilitar la opción de autocompletado --}}
          <input autocomplete="false" name="hidden" type="text" class="hidden">

        <div class="flex gap-4 flex-col md:flex-row lg:gap-6 items-stretch p-3 lg:p-5">

            {{-- DESKTOP --}}
            <div class="hidden md:flex gap-5 lg:gap-8 grow">
                <div id="set-dates" class="search-input-group flex gap-2 basis-[32%] lg:basis-[30%]" x-on:click="openCalendarClick()">
                    <div class="search-input-set">
                        <div class="search-input-label">
                            <label for="start-date">{!! __('car-search-bar.pick-up-day') !!}</label>
                        </div>
                        <input type="text" class="search-input" id="start-date" placeholder="{!! __('car-search-bar.pick-up-day-placeholder') !!}" readonly="readonly"/>
                    </div>
                    <div class="search-input-set">
                        <div class="search-input-label">
                            <label for="end-date">{!! __('car-search-bar.return-day') !!}</label>
                        </div>
                        <input type="text" class="search-input" id="end-date" placeholder="{!! __('car-search-bar.return-day-placeholder') !!}" readonly="readonly"/>
                    </div>
                </div>
                <div id="set-times" class="search-input-group flex gap-2 basis-[21%] lg:basis-[19%]" x-on:click="openCalendarClick()">
                    <div class="search-input-set">
                        <div class="search-input-label">
                            <label for="pickup-hour">{!! __('car-search-bar.time') !!}</label>
                        </div>
                        <input type="text" class="search-input" id="hour-pickup" placeholder="12 AM" readonly="readonly"/>
                    </div>
                    <div class="search-input-set">
                        <div class="search-input-label">
                            <label for="return-hour">{!! __('car-search-bar.time') !!}</label>
                        </div>
                        <input type="text" class="search-input" id="hour-return" placeholder="12 AM" readonly="readonly"/>
                    </div>
                </div>
                <div id="set-locations" class="search-input-group flex gap-2 basis-[41%] lg:basis-[45%]" x-on:click="openLocationsClick()">
                    <div class="search-input-set">
                        <div class="search-input-label">
                            <label for="pickup-location">{!! __('car-search-bar.pick-up-location') !!}</label>
                        </div>
                        <input type="text" class="search-input text-sm" id="pickup-location" placeholder="Keflavik Airport" readonly="readonly"/>
                    </div>
                    <div class="search-input-set">
                        <div class="search-input-label">
                            <label for="return-location">{!! __('car-search-bar.return-location') !!}</label>
                        </div>
                        <input type="text" class="search-input text-sm" id="return-location" placeholder="Keflavik Airport" readonly="readonly"/>
                    </div>
                </div>
            </div>

            {{-- MOBILE --}}
            <div class="md:hidden w-full">
                <div class="search-input-set bg-gray-primary border-2 rounded-lg px-5" x-on:click="openCalendarClick()">
                    <div class="search-input-label text-left">
                        <label >{!! __('car-search-bar.mobile-first-input-title') !!}</label>
                    </div>
                    <input type="text" class="search-input text-left p-0" placeholder="{!! __('car-search-bar.mobile-first-input-placeholder') !!}" readonly="readonly"/>
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="flex items-stretch">
                <button disabled 
                    id="search__button"
                    class="
                        w-full md:w-auto
                        bg-pink-red hover:bg-pink-red-medium rounded-lg md:rounded-xl p-3 lg:px-10
                        font-sans-bold text-white text-lg lg:text-xl" >
                        {!! __('general.search') !!}
                </button>
            </div>
        </div>
        
    </form>

    <div id="calendar" class="searchbar-popover absolute w-full pointer-events-none" :class="openCalendar ? '' : 'hidden'" x-cloak>
        <div 
        id="calendar__layer" 
        class="searchbar-popover__layer max-w-5xl w-full md:w-[90%] pt-8 pb-4 md:pb-10">
            {{-- Mobile: go back --}}
            <x-back-popover click="backShowDate()" />
            {{-- Mobile: close button --}}
            <x-close-popover />
            {{-- Calendar and Time picker: Mobile and desktop --}}
            <x-datepicker-range />
            <x-timepicker-range />
        </div>
    </div>

    <div id="locations" class="searchbar-popover absolute w-full pointer-events-none" :class="showLocations ? 'show' : 'hidden'" x-cloak>
        <div id="locations__layer" class="searchbar-popover__layer w-full md:w-[85%] max-w-4xl px-[4%] pt-10 pb-6 ">
            {{-- Mobile: go back --}}
            <x-back-popover click="backShowTime()"/>
            {{-- Mobile: close button --}}
            <x-close-popover />
            {{-- Location: Mobile and desktop --}}
            <x-selector-location :locations="$locations"/>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function carSearchBar() {
        return {
            openCalendar: false,
            showDate:false,
            showTime:false,
            showLocations: false,
            differentLocation: false,
            showBack: false,

            openCalendarClick() {
                this.openCalendar = true
                this.showDate = true
                this.$refs.startDateButton.click()
                this.showLocations = false
                this.showBack = false

                if(vWidth > 767) {
                    this.showOverlay = true
                    this.showTime = true
                }
            },
            
            openLocationsClick() {
                this.showLocations = true
                this.openCalendar = false
                this.showBack = true
                if(vWidth > 767) {
                    this.showOverlay = true
                    this.showBack = false
                }
                setSameLocationToggle()
            },

            openOverlay(){
                if(vWidth > 767) {
                    this.showOverlay = true
                } else {
                    this.showOverlay = false
                }
            },

            closePopOver() {
                this.openCalendar = false
                this.showDate = false
                this.showTime = false
                this.showLocations = false
                this.showOverlay = false
                this.showBack = false
            },

            toggleLocation() {
                this.differentLocation = !this.differentLocation,
                toggleLocation()
            },

            continueShowTime() {
                this.showDate = false
                this.showTime = true
                this.showBack = true
            },

            continueShowLocation() {
                this.showLocations = true
                this.openCalendar = false
                this.differentLocation = true
                this.showBack = true
            },

            backShowDate() {
                this.showDate = true
                this.showTime = false
                this.showBack = false
            },

            backShowTime() {
                this.openCalendar = true
                this.showDate = false
                this.showTime = true
                this.showLocations = false
                this.showBack = true
            },
        }
    }
    

    /********************
       CHANGE POSITION POPOVER DEPENDING ON SPACE 
    ********************/

    const position = () => {
        const searchBar = document.querySelector('#search-bar');
        const searchBarPositions = searchBar.getBoundingClientRect();
        let spaceTop = searchBarPositions.top;
        let windowHeight = window.innerHeight;
        let spaceBottom = windowHeight - searchBarPositions.bottom;

        const searchbarPopovers = document.querySelectorAll('.searchbar-popover');

        searchbarPopovers.forEach(searchbarPopover => {
            if (spaceTop >= spaceBottom) {
                searchbarPopover.classList.remove('position-top');
                searchbarPopover.classList.add('position-bottom');
            } else {
                searchbarPopover.classList.add('position-top');
                searchbarPopover.classList.remove('position-bottom');
            }
        });
    }

    window.addEventListener('load', position);
    window.addEventListener('scroll', position);
    window.addEventListener('resize', position);

    

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

    function locationsHeight() {
        const locationsLayer = document.getElementById('locations__layer');
        const locations = document.getElementById('locations');

        let locationsLayerHeight = locationsLayer.offsetHeight;

        locations.style.height = locationsLayerHeight + 'px';
    }

    new ResizeObserver(locationsHeight).observe(locations__layer);


    
</script>
@endpush
