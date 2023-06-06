<div :class="showDate ? '' : 'hidden'" class="flex flex-col h-full">
    <div id="calendar-picker" x-on:click="openCalendarClick()" x-ref="startDateButton" class="hidden"></div>
    <div class="md:hidden w-[80%] text-center mx-auto">
        <button x-on:click="continueToDefault()" disabled id="continue-date__button" class="w-full btn btn-red px-16 py-3">{!! __('car-search-bar.mobile-continue-button') !!}</button>
    </div>
</div>
    

@push('scripts')
<script>

    /********************   
        TRANSLATE TOOLTIP
    ********************/
    function tooltipText(locale, day) {
        let tooltipTranslated = {};

        switch (locale) {
            case 'es':
                tooltipTranslated = {
                    one: 'día',
                    other: 'días'
                };
                break;

            default:
                tooltipTranslated = {
                    one: 'day',
                    other: 'days'
                };
                break;
        }
        return tooltipTranslated[day];
    }



    /********************
        WEEK DAY NAME FORMAT
    ********************/

    const dayName = (locale, day) => {
        let name = day.textContent;
        if (name.length >= 3) {
            const shortName = name.slice(0, -1);
            day.textContent = shortName;
        }
    }
    
    // Array días de la semana (para poder mostrar el día de la semana al seleccionar)

    let arrayWeekDays= [];

    const arrayDays = (locale, day) => {
        let dayWeekName = day.textContent;

        arrayWeekDays.push(dayWeekName);

        return arrayWeekDays;
    }

    
    
    /********************
        STRUCTURE CALENDAR MOBILE
    ********************/
    let vWidth;
    let vHeight;

    const getSizeScreen = () => {
        vWidth = window.innerWidth;
        vHeight = window.innerHeight;
    }

    const numberCalendar = () => {
        getSizeScreen();

        if (vWidth <= 767) {
            return 24;
        } else {
            return 2;
        }
    }

    const structureCalendar = () => {
        getSizeScreen();

        if (vWidth <= 767) {
            return 1;
        } else {
            return 2;
        }
    }

    window.addEventListener('load', numberCalendar, structureCalendar)
    window.addEventListener('resize',  numberCalendar, structureCalendar)

    let scrollTopPosition;



    
	/********************
        CALENDAR
    ********************/

    document.addEventListener('DOMContentLoaded', () => {          
        const picker = new easepick.create({
            element: document.getElementById('calendar-picker'),
            css: [
                '/css/easepick.css',
            ],
            plugins: [RangePlugin],
            calendars: numberCalendar(), //Number of visible months.
            grid: structureCalendar(), //Number of calendar columns.	
            firstDay: 7,
            autoApply: false,
            documentClick:false,
            lang: '{{ App::getLocale() }}',
            RangePlugin: {
                locale: {
                    one: tooltipText('{{ App::getLocale() }}', 'one'),
                    other: tooltipText('{{ App::getLocale() }}', 'other'),
                }
            },
            locale: {
                previousMonth: '<svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg"><path fill="#000" d="M0.606095 11.9238C0.623254 11.6068 0.754464 11.3054 0.977016 11.0716L11.1508 0.43725C11.4062 0.17139 11.7605 0.0146009 12.1354 0.000967091C12.5104 -0.0126668 12.8757 0.118316 13.1508 0.364699C13.4263 0.611082 13.5888 0.952901 13.6024 1.31469C13.6166 1.67647 13.4808 2.029 13.226 2.29437L3.94388 12.0002L13.226 21.7056C13.4813 21.9714 13.6171 22.3235 13.6024 22.6857C13.5883 23.0475 13.4258 23.3893 13.1508 23.6357C12.8757 23.8821 12.5104 24.0131 12.1354 23.999C11.7605 23.9853 11.4062 23.8285 11.1508 23.5632L0.977016 12.9288C0.717119 12.6561 0.582881 12.2933 0.606095 11.9233V11.9238Z" fill="black"/></svg>',
                nextMonth: '<svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg"> <path fill="#000" d="M13.3011 11.9238C13.284 11.6068 13.1528 11.3054 12.9302 11.0716L2.75639 0.43725C2.50104 0.17139 2.14677 0.0146009 1.77181 0.000967091C1.39685 -0.0126668 1.03148 0.118316 0.756446 0.364699C0.480905 0.611082 0.318407 0.952902 0.304781 1.31469C0.290651 1.67647 0.426404 2.029 0.681254 2.29437L9.96335 12.0002L0.681254 21.7056C0.425899 21.9714 0.290146 22.3235 0.304781 22.6857C0.318912 23.0475 0.48141 23.3893 0.756446 23.6357C1.03148 23.8821 1.39685 24.0131 1.77181 23.999C2.14677 23.9853 2.50104 23.8285 2.75639 23.5632L12.9302 12.9288C13.1901 12.6561 13.3243 12.2933 13.3011 11.9233V11.9238Z" fill="black"/> </svg>',
            },
                                                    
            setup(picker) {                
                picker.on('preselect', (e) => { //Event is called on select days (before submit selection). When autoApply option is false.
                    const { start, end } = e.detail;
                    
                    scrollTopPosition = e.target.querySelector('main').scrollTop;
                    
                    
                    //set dates in order to show them selected when calendar hides/shows
                    picker.setStartDate(start);
                    picker.setEndDate(end);
            
                    // Show date
                    const startDay = document.querySelectorAll('.start-day')
                    const startDayWeek = document.querySelectorAll('.start-dayweek')
                    const startMonth = document.querySelectorAll('.start-month')
                    const endDay = document.querySelectorAll('.end-day')
                    const endDayWeek = document.querySelectorAll('.end-dayweek')
                    const endMonth = document.querySelectorAll('.end-month')

                    // Show selected days
                    for (let i = 0; i < startDay.length; i++) {
                        showDay(start, startDay[i]);
                    }
                    for (let i = 0; i < endDay.length; i++) {
                        showDay(end, endDay[i]);
                    }
                    // Show selected day on week
                    for (let i = 0; i < startDayWeek.length; i++) {
                        showDayWeek(start, startDayWeek[i]);
                    }
                    for (let i = 0; i < endDayWeek.length; i++) {
                        showDayWeek(end, endDayWeek[i]);
                    }
                    // Show selected month
                    for (let i = 0; i < startMonth.length; i++) {
                        showMonth(start, startMonth[i]);
                    }
                    for (let i = 0; i < endMonth.length; i++) {
                        showMonth(end, endMonth[i]);
                    }


                    // Set date to input value
                    const startInput = document.querySelectorAll('.start-date')
                    const endInput = document.querySelectorAll('.end-date')

                    for (let i = 0; i < startInput.length; i++) {
                        formatInput(start, startInput[i]);
                    }
                    for (let i = 0; i < endInput.length; i++) {
                        formatInput(end, endInput[i]);
                    }


                    // If date inputs are filled:
                    // - Set as 'active' 
                    // - Enable button
                    // - Mobile: show input dates
                    const searchButton = document.getElementById('search__button')
                    const continueButton = document.getElementById('continue-date__button')
                    const emptyInputMobile = document.getElementById('mobile-empty-dates')
                    const datesMobile = document.querySelectorAll('.mobile-dates')


                    if(startInput[0].value !== '') {
                        document.getElementById('set-dates').classList.add('active')
                        searchButton.setAttribute('disabled')
                        continueButton.setAttribute('disabled')
                        
                        if(endInput[0].value !== '') {
                            searchButton.removeAttribute('disabled')
                            continueButton.removeAttribute('disabled')
                        }

                        // mobile
                        if (vWidth <= 767) {
                            emptyInputMobile.classList.add('hidden');

                            for (let i = 0; i < datesMobile.length; i++) {
                                datesMobile[i].classList.remove('hidden');
                            }
                            // datesMobile.classList.remove('hidden');
                        }
                    } else {
                        document.getElementById('set-dates').classList.remove('active')
                        searchButton.setAttribute('disabled')
                        continueButton.setAttribute('disabled')

                        // mobile
                        if (vWidth <= 767) {
                            emptyInputMobile.classList.remove('hidden');
                            datesMobile.classList.add('hidden');
                        }
                    }
                }),					
                picker.on('view', (e) => {
                    const { view, date, target } = e.detail;
                    
                    if (view === 'Footer') {

                        let mainElement = e.target.querySelector('main');


                        if (scrollTopPosition !== 'undefined'){
                            mainElement.scrollTop = scrollTopPosition;
                        }

                        // calendarsHeight(e)


                        // Tooltip mobile
                        let tooltip = e.target.querySelector('.range-plugin-tooltip')
                        
                        mainElement.addEventListener("mouseover", function() {
                            let tooltipValue = tooltip.innerHTML
                            // console.log(tooltipValue)
                        })
                    }
                    
                    if (view === 'CalendarDay') {							
                        target.dataset.day = date.getDate(); //add the data-day attribute to the days in order to use it as a 'content' in the css ::after selector
                        
                        if (date <= new Date()) target.classList.add('disabled') //disable days before tomorrow
                    }
                    
                    if (view === 'CalendarDayName') {
                        arrayDays('{{ App::getLocale() }}', target)
                        dayName('{{ App::getLocale() }}', target)
                    }
                    
                });
                
            },											
        });



        /********************
            DATE FORMAT
        ********************/

        const showDay = function(date, element) {
            if (date) {
                element.innerHTML = date.getDate()            
            }
        }

        const showDayWeek = function(date, element) {
            if (date) {
                element.innerHTML = arrayWeekDays[date.getDay()]            
            }
        }

        const showMonth = function(date, element) {
            if (date) {
                element.innerHTML = monthNames('{{ App::getLocale() }}', date.getMonth())          
            }
        }

        const monthNames = function(locale, month) {
            let monthNames = [];
            
            monthNames['en'] = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            monthNames['es'] = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];

            return monthNames[locale][month]
        }

        const formatInput = function(date, input) {
            if (date) {
                input.value = date.format( 'DD-MM-YYYY', '{{ App::getLocale() }}')
            } else {
                input.value = ''
            }
            
            toggleClassToInputGroup(input, 'active', date)
        }

        const toggleClassToInputGroup = function(input, klass, add = true) {				
            if (add) {
                input.parentElement.classList.add(klass)
            } else {
                input.parentElement.classList.remove(klass)
            }
        }		

    });		
</script>
@endpush
