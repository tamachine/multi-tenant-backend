<div>
    <x-admin.form-section submit="update" formClass="block">
        <x-slot name="title">
            {{ __('Edit Translation') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Enter the translation details') }}
        </x-slot>

        <x-slot name="form">
            @foreach(config('languages') as $key => $language)
                <!-- Text -->
                <div class="px-4 mt-4">
                    <x-admin.label for="text_{{$key}}" value="{{ __('Text') }} - {{$language}}" />                
                    
                    <div wire:ignore class="py-2">
                        <trix-editor                        
                            class="formatted-content mt-1 ring-purple-700 purple-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400"
                            x-ref="trix"
                            wire:model.debounce.60s="text.{{ $key }}"
                            wire:key="text.{{ $key }}"
                            x-data
                            x-on:trix-change="$dispatch('input', event.target.value)"                        
                        ></trix-editor>
                    </div>
                                
                    <x-admin.input-error for="text.{{ $key }}" class="mt-2" />
                </div>           
                <hr class="my-8 px-4">
            @endforeach        
            
        </x-slot>

        <x-slot name="actions">
            <x-admin.button wire:loading.attr="disabled">
                {{ __('Save Translation') }}
            </x-admin.button>
        </x-slot>
    </x-admin.form-section>
</div>