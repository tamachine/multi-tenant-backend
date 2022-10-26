<div x-data="{ tab: '#sameLocation' }" class="bg-white rounded-3xl w-6xl mx-auto text-lg font-medium text-black-secondary shadow-xl">

  <form>

    <div class="flex flex-row gap-6">

      <div class="flex flex-col pl-16 pb-6 mt-4 w-full">
        
        <div class="flex flex-row justify-start mb-7 border-b gap-12">

          <a class="px-4 pb-1 hover:border-pink-red border-transparent border-b-2" 
            href="#" @click.prevent="tab='#sameLocation'" :class="{ 'border-pink-red': tab == '#sameLocation' }">Same location</a>
            
          <a class="px-4 pb-1 hover:border-pink-red border-transparent border-b-2" 
            href="#" @click.prevent="tab='#differentLocation'" :class="{ 'border-pink-red': tab == '#differentLocation' }">Different location</a>      
              
        </div>
        
        <div>
          
          <div>
            <div class="flex flex-row w-full justify-between gap-2">
              <div class="search-input-group">
                <div>
                  <div>First day</div>
                  <div>Pick up day</div>
                </div>
                <input type="text" class="search-input" />                
              </div>
              <div class="search-input-group">
                <div>
                  <div>Last day</div>
                  <div>Drop off day</div>
                </div>
                <input type="text" class="search-input" />                
              </div>
              <div class="search-input-group">
                <div>
                  <div>Pick up</div>
                  <div>Select location</div>
                </div>
                <input type="text" class="search-input" />                
              </div>
              <div class="search-input-group" x-show="tab == '#differentLocation'">
                <div>
                  <div>Return</div>
                  <div>Select location</div>
                </div>
                <input type="text" class="search-input" />                
              </div>              
            </div>
          </div>          

        </div>

      </div>

      <div class="pr-16 flex items-end pb-6">
        <button class="btn btn-red">Search</button>
      </div>

    </div>

  </form>

</div>