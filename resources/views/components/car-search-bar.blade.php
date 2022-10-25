<div x-data="{ tab: '#sameLocation' }" class="bg-white rounded-3xl max-w-6xl mx-auto text-lg font-medium text-black-secondary">

  <form>

    <div class="flex flex-row gap-6">

      <div class="flex flex-col pl-16 py-6 w-full">
        
        <div class="flex flex-row justify-start mb-7 border-b gap-12">

          <a class="px-4 pb-1 hover:border-pink-red border-transparent border-b-2" 
            href="#" @click="tab='#sameLocation'" :class="{ 'border-pink-red': tab == '#sameLocation' }">Same location</a>
            
          <a class="px-4 pb-1 hover:border-pink-red border-transparent border-b-2" 
            href="#" @click="tab='#differentLocation'" :class="{ 'border-pink-red': tab == '#differentLocation' }">Different location</a>      
              
        </div>
        
        <div>
          
          <div x-show="tab == '#sameLocation'" x-cloak>
            <div class="flex flex-row flex-wrap">
              <input type="text" class="search-input" />
              <input type="text" class="search-input" />
              <input type="text" class="search-input" />
              <input type="text" class="search-input" />
            </div>
          </div>

          <div x-show="tab == '#differentLocation'" x-cloak>
              <p>This is the content of Tab 2</p>
          </div>

        </div>

      </div>

      <div class="pr-16 flex items-end pb-6">
        <button class="btn btn-red">Search</button>
      </div>

    </div>

  </form>

</div>