<div 
    class="absolute w-full max-w-5xl z-40" 
    x-data="timePickerRange()"     
    x-init=init() 
    x-ref="timePicker"
    x-cloak
    x-show="showTimePicker"    
    @timepicker-show.window="show()"    
    > 
    <div class="flex flexrow justify-left items-center gap-6 text-lg text-black-primary">
        <div class="text-gray-light">
            {!! __('car-search-bar.select-hours') !!}
        </div>

        <div class="w-auto flex flex-row items-center gap-3">
            <div>
                <x-selectable 
                    :SelectableComponent="$carSearchHoursSelectableComponent"
                />
            </div>

            <span>
                {!! __('car-search-bar.hours-pickup') !!}
            </span>
        </div>

        <div class="w-auto flex flex-row items-center gap-3">
            <div>
                <x-selectable 
			        :SelectableComponent="$carSearchHoursSelectableComponent"
		        />
            </div>
        
            <span>
            {!! __('car-search-bar.hours-return') !!}
            </span>
        </div>
    </div>   
    <div id="hide-timepicker" class="hidden" x-on:click="showTimePicker = false"></div>
</div>

@push('scripts')
    <script>		
        function timePickerRange() {
            return {
                showTimePicker: false,                                  

                init: function() {                                               
                    
                },                

                show: function() {                                				
                    this.setPosition()

                    this.showTimePicker = true        
                },

                setPosition: function() {
                    this.$nextTick(() => {    
                        let input   = document.getElementById('start-date')
                        let calendar= document.querySelector('.easepick-wrapper').shadowRoot.querySelector('.container')
                        
                        let thereIsPlaceForElementAbove = input.getBoundingClientRect().top >= (calendar.offsetHeight + 20);                                                 

                        if (thereIsPlaceForElementAbove) {                           
                            this.$refs.timePicker.style.top = topAboveDifferentLocation + calendar.offsetHeight - 20 + "px";
                        } else {                           
                            this.$refs.timePicker.style.top = topBelowDifferentLocation + calendar.offsetHeight + "px";
                        }    
                        
                        this.setHorizontalPosition(this.$refs.timePicker)                                          
                    })
                },

                setHorizontalPosition: function (el) {
                    el.style.left = "115px"
                    el.style.right = "0px"
                    el.style.marginLeft = "auto"
                    el.style.marginRight = "auto"                    
                }
            }
        }	
    </script>
@endpush