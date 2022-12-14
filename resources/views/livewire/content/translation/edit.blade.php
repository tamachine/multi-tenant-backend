<div>
    <x-admin.form-section submit="update" formClass="block">
        <x-slot name="title">
            {{ __('Edit Translation') }}
        </x-slot>        

        <x-slot name="description">
            {{ $translation->full_key }}
        </x-slot>

        <x-slot name="form">
            @foreach(config('languages') as $key => $language)
                <!-- Text -->
                <div class="px-4 mt-4">
                    <x-admin.label for="text_{{$key}}" value="{{ __('Text') }} - {{$language}}" />                                    
                    {{-- 
                        The TinyMCE manipulates the DOM as soon as they are initialized and continues to mutate the DOM as you interact with them. 
                        This makes it impossible for Livewire to keep track, in this case, we can make use of Livewire's wire:ignore tag. 
                        This tells Livewire to ignore this part of DOM.
                    --}}
                    <div wire:ignore class="py-2">                        
                        @if($translation->rich)                                          
                        <textarea
                            class="tiny"
                            wire:model.debounce.60s="text.{{ $key }}"
                            wire:key="text.{{ $key }}"
                            id="text_{{ $key }}"
                            name="text.{{ $key }}"
                            >                            
                        </textarea>                        
                        @else
                        <x-admin.input id="text_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="text.{{ $key }}" autocomplete="translation_text" />
                        @endif                        
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

@push('scripts')
{{-- 
    Now Livewire has ignored the TinyMCE part of the code, so it has no idea how to deal with livewire variables in its component class.
    In fact, all we need Livewire to know is the text in the textarea. In a case like this, we can use the special $this blade directive to set the values for the variables 
--}}
<script>
    document.addEventListener('DOMContentLoaded', () => {      
        tinymce.init({
            selector: '.tiny',
            plugins: 'link',        
            menubar: false,
            toolbar: 'undo redo | bold italic underline strikethrough | link | removeformat',                       
            setup: function (editor) {//view above comment
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {                    
                    @this.set(e.target.targetElm.name, editor.getContent());
                });
            }            
        });
    });
</script>
@endpush
