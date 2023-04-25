<div class="border-gray-300 rounded-md border w-fit mb-4 max-w-md hover:bg-blue-300" x-data="{ openConfirm: false }" wire:loading.remove wire:target="image" >
    <!-- image -->
    <div class="flex flex-col justify-between h-full">
        <div class="m-4">
            <img src="{{ $imageUrl }}">
        </div>
        
        <div class="flex justify-between" x-data="copyToClipboard()">
            <!-- url -->            
            <x-admin.button type="button" class="m-4 mt-0 bg-green-700" x-clipboard.raw="{{ asset($imageUrl) }}" x-on:click="click()">
                <span x-text="text"></span>
            </x-admin.button>

            <!-- delete button -->
            <x-admin.button type="button" class="m-4 mt-0 bg-red-700" x-on:click="openConfirm = true">
                Delete
            </x-admin.button>
        </div>
    </div>

    <!-- delete modal -->
    <x-admin.confirm-modal     
        event="check"            
        body="Are you sure that you want to delete the photo?" 
        title="Delete photo" 
        wire-confirm-action="{{ $wireAction }}"               
    />
</div>