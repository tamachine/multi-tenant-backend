{{-- desktop --}}
<div 
    x-data="carSearchBar()" 
    :class="showOverlay ? 'shadow-t-xl' : 'shadow-xl'"
    class="hidden md:block bg-white rounded-3xl max-w-6xl mx-auto text-lg font-medium text-black-secondary"
>
    <form>
        <div class="flex flex-row gap-6">
            <div class="flex flex-col pl-16 pb-6 mt-4 w-full">                
                <div class="flex flex-row justify-start mb-7 border-b gap-12">
                    <a class="px-4 pb-1 hover:border-pink-red border-transparent border-b-2" 
                        href="#" @click.prevent="tab='#sameLocation'" :class="{ 'border-pink-red': tab == '#sameLocation' }">{{ __('web.car-search-bar.same') }}</a>
                        
                    <a class="px-4 pb-1 hover:border-pink-red border-transparent border-b-2" 
                        href="#" @click.prevent="tab='#differentLocation'" :class="{ 'border-pink-red': tab == '#differentLocation' }">{{ __('web.car-search-bar.different') }}</a>                          
                </div>
                
                <div>
                    <div>            
                        <div 
                            class="grid grid-cols-3 w-full justify-between gap-2"
                            :class="tab=='#differentLocation' ? 'grid-cols-4' : 'grid-cols-3'"
                            >                
                            <div class="search-input-group">
                                <div>
                                    <div>{{ __('web.car-search-bar.first-day') }}</div>
                                    <div>{{ __('web.car-search-bar.pick-up-day') }}</div>
                                </div>
                                <input type="text" class="search-input" :class="tab=='#differentLocation' ? '' : 'font-medium text-2xl'" id="start-date" x-on:click="startDateClick()" x-ref="startDateButton" />                                    
                            </div>
                            <div class="search-input-group">
                                <div>
                                    <div>{{ __('web.car-search-bar.last-day') }}</div>
                                    <div>{{ __('web.car-search-bar.drop-off-day') }}</div>
                                </div>
                                <input type="text" class="search-input" :class="tab=='#differentLocation' ? '' : 'font-medium text-2xl'" id="end-date" x-on:click="endDateClick()" />                
                            </div>
                            <div class="search-input-group">
                                <div>
                                    <div>{{ __('web.car-search-bar.pick-up') }}</div>
                                    <div>{{ __('web.car-search-bar.select-location') }}</div>
                                </div>
                                <input type="text" class="search-input" />                
                            </div>
                            <div class="search-input-group" x-cloak x-show="tab == '#differentLocation'" id="differentLocationInputGroup">
                                <div>
                                    <div>{{ __('web.car-search-bar.drop-off') }}</div>
                                    <div>{{ __('web.car-search-bar.select-location') }}</div>
                                </div>
                                <input type="text" class="search-input" />                
                            </div>              
                        </div>
                    </div>          
                </div>
            </div>

            <div class="pr-16 flex items-end pb-6">
                <button class="btn btn-red">{{ __('web.general.search') }}</button>
            </div>
        </div>
    </form>  
</div>
{{-- desktop end --}}

{{-- mobile --}}
<div class="md:hidden block px-11 py-8">
    <form>
        <div class="flex flex-col gap-2">
            <div class="search-input-group">
                <div>
                    <div>{{ __('web.car-search-bar.mobile-first-input-title') }}</div>
                    <div>{{ __('web.car-search-bar.mobile-first-input-placeholder') }}</div>
                </div>
                <input type="text" class="search-input" />                
            </div>
            <button class="btn btn-red">{{ __('web.general.search') }}</button>
        </div>
    </form>
</div>
{{-- mobile end --}}

<x-datepicker-range
    id="start-date"    
/>

@push('scripts')
<script>
    function carSearchBar() {
        return { 
            tab: '#sameLocation',

            startDateClick: function() {
                this.showOverlay = true                                
               
                window.dispatchEvent(new CustomEvent('timepicker-show'));
            },

            endDateClick: function() {
                this.$refs.startDateButton.click()
            }
        }
    }
</script>
@endpush

