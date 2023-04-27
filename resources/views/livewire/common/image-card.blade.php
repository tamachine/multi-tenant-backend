<div class="border-gray-300 rounded-md border w-fit mb-4 max-w-md hover:bg-blue-300" x-data="{ openConfirm: false }">
    <!-- image -->
    <div class="flex flex-col justify-between h-full">
        <div class="m-4">
            <img src="{{ $imageUrl }}">
        </div>

        <!-- name -->  
        
        <div class="m-4">            
            @if($modelImage->is_external_url)
                <span>This image cannot be updated because is an external file.</span>
            @else
                <div class="flex flex-row justify-between items-end">
                    <div>
                        <x-admin.label value="Image name" />
                        <x-admin.input type="text" name="imageName" value="{{ $imageName }}" wire:model="imageName"/>
                    </div>                
                    <x-admin.button type="text" class="bg-green-700" wire:click.prevent="changeName">
                        Change name
                    </x-admin.button>            
                </div>
                <x-admin.input-error for="imageName" class="mt-2"/>
            @endif
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
        wire-confirm-action="deleteImage()"               
    />
</div>