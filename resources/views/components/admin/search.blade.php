<div class="flex-1 flex my-3 ml-3 w-full">
    <form class="w-80 sm:w-96 flex md:ml-0" action="#" method="GET">
        <label for="search_field" class="sr-only">Search</label>

        <div class="flex w-full text-gray-400 focus-within:text-gray-600">
            <div class="inset-y-0 left-0 -mr-8 flex items-center z-10">
                <svg class="h-5 w-5" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>

            <input
                id="search_field"
                name="search_field"
                placeholder="Search"
                type="search"
                wire:model.debounce.250ms="search"
                class="block w-full h-full pl-10 pr-3 py-2 border-transparent rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm"
            >
        </div>
    </form>
</div>
