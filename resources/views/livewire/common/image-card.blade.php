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
                <div>
                    <div class="flex flex-row justify-start items-end gap-2">
                        <div>
                            <x-admin.label value="Image name" />
                            <x-admin.input type="text" name="imageName" value="{{ $imageName }}" wire:model="imageName"/>
                        </div>                
                        <x-admin.button type="text" class="bg-green-700" wire:click.prevent="changeName">
                            Change name
                        </x-admin.button>            
                    </div>
                    <x-admin.input-error for="imageName" class="mt-2"/>
                </div>    
                <div class="mt-4"
                    x-data="{altModal: false}"
                    x-on:close-modal.window="altModal = false"
                    >
                    <x-admin.button type="text" class="bg-green-700" x-on:click.prevent="altModal = true">
                        Manage alt
                    </x-admin.button>
                    <div
                        x-show="altModal"                        
                        x-cloak                        
                        >
                        <div class="modal"  >
                            <div class="modal-overlay"></div>
                            <div class="modal-container">
                                <div class="modal-content" x-on:click.outside="altModal = false">
                                    <div class="modal-heading">                                        
                                        <h1>Manage Alternative texts</h1>
                                
                                        <div class="modal-close cursor-pointer z-50 block" x-on:click="altModal = false">
                                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                            </svg>
                                        </div>
                                    </div>                                    
                                    <div class="modal-body">                                                        
                                        @foreach(App\Helpers\Language::availableLanguages() as $key => $language)                                    
                                            <div class="px-4 mt-4">
                                                <x-admin.label for="alt_{{$key}}" value="Alt - {{$language}}" />
                                                <x-admin.input id="alt_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="alt.{{ $key }}"/>
                                            </div>
                                        @endforeach    
                                        <div class="m-4 flex justify-center">
                                            <x-admin.button type="text" class="bg-green-700" wire:click.prevent="saveAlt">
                                                Save alts
                                            </x-admin.button>
                                        </div>
                                    </div>                                                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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