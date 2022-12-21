<div class="p-4">
    <div class="text-xl text-green-700 font-bold">
        Booking search
    </div>

    <div class="flex mt-4">
         <!-- Order ID -->
        <div>
            <x-admin.input id="order_id" type="text" class="block w-40" maxlength="255" wire:model.defer="order_id" autocomplete="order_id" placeholder="Order ID" />
        </div>

        <!-- Search Buttonr -->
        <div class="ml-4">
            <button class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-white hover:border-green-700 hover:text-green-700 active:bg-white active:border-green-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                type="button"
                wire:click="searchBooking"
            >
                Search
            </button>
        </div>
    </div>
</div>
