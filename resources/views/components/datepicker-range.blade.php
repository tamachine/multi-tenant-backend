@push('scripts')
    <script>
    	document.addEventListener('DOMContentLoaded', () => {          
        	const picker = new easepick.create({
				element: document.getElementById('{{$id}}'),
				css: [
					'css/easepick.css',					
				],
				plugins: [RangePlugin, TimePlugin],
				calendars: 2, //Number of visible months.
				grid: 2, //Number of calendar columns.	
				firstDay: 7,	
				zIndex: -1,
				TimePlugin: {
					format: 'HH:mm',
					format12: true,
					stepMinutes: 15
				},
				setup(picker) {
					picker.on('show', (e) => {
						const { view, date, target } = e.detail;
												
						setPosition(e.path[0], target);						
					}),
					picker.on('hide', (e) => {
						hideOverlay();
					}),
					picker.on('view', (e) => {
						const { view, date, target } = e.detail;

						if (view === 'CalendarDay') {
							target.dataset.day = date.getDate();
						}

						if (view === 'TimePluginInput') {
						
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
				const topAbove = -580;
				const topBelow = 77;
				const lefCustom = -310;
								
				let thereIsPlaceForElementAbove = input.getBoundingClientRect().top >= (el.offsetHeight + 20);
								
				if (thereIsPlaceForElementAbove) {
					el.style.top = topAbove + "px";
				} else {
					el.style.top = topBelow + "px";
				}

				el.style.left = lefCustom + "px";
			}	
			
			const hideOverlay = function() {
				document.getElementById('hide-overlay').click(); {{-- only way I found to access Alpine from here --}}	
			}
      	});		
    </script>
@endpush
