<div x-data="{ openConfirm: false }" class="p-4 sm:p-10">
    <x-admin.confirm-modal 
        event="check" 
        body="{!! __('Are you sure? <br><br>If you change the inputs to plain text, all html tags from all translations will be <strong>stripped</strong>') !!}" 
        title="Rich text confirmation" 
        wire-confirm-action="check"
        wire-cancel-action="cancel"
        />
    
    <x-admin.form-section submit="update" formClass="block">
        <x-slot name="title">
            {{ __('Edit Translation') }}
        </x-slot>        

        <x-slot name="description">
            {{ $translation->full_key }}
        </x-slot>

        <x-slot name="form">
            <div class="px-4 mt-4">     
                <x-admin.label value="{{ __('Rich text') }}" />             
                <label for="rich" class="inline-flex items-center py-2">
                    <x-admin.checkbox id="rich" wire:model="rich" x-on:click="{{ $rich ? 'openConfirm = true' : '' }}" wire:click="{{ $rich ? '' : 'check' }}" />
                    <span class="ml-3 italic">                        
                        {{ __('Check this option to transform all inputs in rich text editors or uncheck it for plain text inputs') }}
                    </span>
                </label>
            </div>
            <hr class="my-8 px-4">
            @foreach(App\Helpers\Language::availableLanguages() as $key => $language)
                <!-- Text -->
                <div class="px-4 mt-4">
                    <x-admin.label for="text_{{$key}}" value="{{ __('Text') }} - {{$language}}" />                                    
                    {{-- 
                        The TinyMCE manipulates the DOM as soon as they are initialized and continues to mutate the DOM as you interact with them. 
                        This makes it impossible for Livewire to keep track, in this case, we can make use of Livewire's wire:ignore tag. 
                        This tells Livewire to ignore this part of DOM.
                    --}}
                    <div wire:ignore class="py-2 relative">                        
                        @if($translation->rich)                                          
                        <textarea                            
                            class="tiny hidden"
                            wire:model.debounce.60s="text.{{ $key }}"
                            wire:key="text.{{ $key }}"
                            id="text_{{ $key }}"
                            name="text.{{ $key }}"
                            >                            
                        </textarea>                             
                        <div role="status" class="absolute top-1/2 left-1/2 z-20 spinner">
                            <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>                
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
                    hideSpinners();
                });
                editor.on('change', function (e) {                    
                    @this.set(e.target.targetElm.name, editor.getContent());
                });
            }            
        });
    });

    hideSpinners = function() {
        var elems = document.querySelectorAll('.spinner');
        var index = 0, length = elems.length;
        for ( ; index < length; index++) {
            elems[index].style.display = "none";
        }
    }
</script>
@endpush
