<div x-data="{ tab: '#sameLocation' }" class="bg-white rounded-3xl w-6xl mx-auto text-lg font-medium text-black-secondary shadow-xl">

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
            <div class="flex flex-row w-full justify-between gap-2">
              <div class="search-input-group">
                <div>
                  <div>{{ __('web.car-search-bar.first-day') }}</div>
                  <div>{{ __('web.car-search-bar.pick-up-day') }}</div>
                </div>
                <input type="text" class="search-input" />                
              </div>
              <div class="search-input-group">
                <div>
                  <div>{{ __('web.car-search-bar.last-day') }}</div>
                  <div>{{ __('web.car-search-bar.drop-off-day') }}</div>
                </div>
                <input type="text" class="search-input" />                
              </div>
              <div class="search-input-group">
                <div>
                  <div>{{ __('web.car-search-bar.pick-up') }}</div>
                  <div>{{ __('web.car-search-bar.select-location') }}</div>
                </div>
                <input type="text" class="search-input" />                
              </div>
              <div class="search-input-group" x-show="tab == '#differentLocation'">
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