<div id="calendar-time-picker">
	<x-timepicker-range />
</div>

@push('scripts')
    <script>		
		const topAbove = -595;
		const topBelow = 77;
		const lefCustom = -310;
						
    	document.addEventListener('DOMContentLoaded', () => {          
        	const picker = new easepick.create({
				element: document.getElementById('{{$startId}}'),
				css: [
					'css/easepick.css',					
				],
				plugins: [RangePlugin],
				calendars: 2, //Number of visible months.
				grid: 2, //Number of calendar columns.	
				firstDay: 7,	
				zIndex: -1,		
				autoApply: false,
				lang: '{{ App::getLocale() }}',				
				documentClick(e) {					
					//don't close calendar if user is using time picker
					if(picker.isShown()) {
						let calendarTimePicker = document.getElementById('calendar-time-picker')
						let calendarWrapper = document.querySelector('.easepick-wrapper')
						let calendar = calendarWrapper.shadowRoot.querySelector('.container')
                        			
						if  (
							calendarTimePicker.contains(e.target) || 
							calendarTimePicker == e.target ||
						 	calendarWrapper.contains(e.target) || 
							calendarWrapper == e.target ||
						 	calendar.contains(e.target) || 
							calendar == e.target
							) {		

							picker.show()
						} else {
							picker.hide()						
						}		
					}														
				},										
				setup(picker) {
					picker.on('show', (e) => {
						const { view, date, target } = e.detail;
												
						setPosition(e.path[0], target);								
					}),
					picker.on('hide', (e) => {		
						const startInput = document.getElementById('start-date')
						const endInput = document.getElementById('end-date')

						hideOverlay()
						hideTimePicker()		
						toggleClassToInputGroup(endInput, 'stepped', endInput.value)															
					}),
					picker.on('preselect', (e) => { //Event is called on select days (before submit selection). When autoApply option is false.
						const { start, end } = e.detail;	
						
						const startInput = document.getElementById('start-date')
						const endInput = document.getElementById('end-date')
						
						//set dates in order to show them selected when calendar hides/shows
						picker.setStartDate(start);
						picker.setEndDate(end);

						//format date and inputs
						formatInput(start, startInput)
						formatInput(end, endInput)									
						toggleClassToInputGroup(startInput, 'stepped', end)							
					}),					
					picker.on('view', (e) => {
						const { view, date, target } = e.detail;
						
						if (view === 'CalendarDay') {							
							target.dataset.day = date.getDate(); //add the data-day attribute to the days in order to use it as a 'content' in the css ::after selector
							
							if (date <= new Date()) target.classList.add('disabled') //disable days before tomorrow					
						}						
					});
				},											
			});				

			/**
			 * if there is room for the calendar above the search car bar, it is positioned on top of it. 
			 * if there is no room, it is positioned below it.
			 * 
			 * el -> element that has to be positioned (calendar)
			 * input -> element where the 'el' is positioned from (input)
			 */
			const setPosition = function(el, input) {														
				let thereIsPlaceForElementAbove = input.getBoundingClientRect().top >= (el.offsetHeight + 20)
								
				if (thereIsPlaceForElementAbove) {
					el.style.top = topAbove + "px"
				} else {
					el.style.top = topBelow + "px"
				}

				el.style.left = lefCustom + "px"
			}	
			
			const hideOverlay = function() {
				document.getElementById('hide-overlay').click(); {{-- only way I found to access Alpine from here --}}	
			}	
			
			const hideTimePicker = function() {
				document.getElementById('hide-timepicker').click(); {{-- only way I found to access Alpine from here --}}	
			}		
			
			const formatDate = function(d) {
				if (d) {
					return d.getDate() + " " + monthNames('{{ App::getLocale() }}', d.getMonth()) + ", " +d.getFullYear()
				} else {
					return ''
				} 
			}

			const monthNames = function(locale, month) {
				let monthNames = [];

				monthNames['en'] = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
				monthNames['es'] = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];

				return monthNames[locale][month]
			}

			const formatInput = function(date, input) {
				input.value = formatDate(date)
				
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
