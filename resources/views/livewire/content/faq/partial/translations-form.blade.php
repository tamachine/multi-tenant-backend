<x-slot name="form">        
    @foreach(App\Helpers\Language::availableLanguages() as $key => $language)
        <!-- Question -->
        <div class="px-4 mt-10 md:mt-6">
            <x-admin.label for="question_{{$key}}" value="{{ __('Question') }} - {{$language}}" />
            <x-admin.input id="question_{{$key}}" type="text" class="w-full mt-1 block" maxlength="255" wire:model.defer="question.{{ $key }}" autocomplete="faq_question" />
            <x-admin.input-error for="question.{{ $key }}" class="mt-2" />
        </div>   
        <!-- Answer -->
        <div class="px-4 mt-10 md:mt-6">
            <x-admin.label for="answer_{{$key}}" value="{{ __('Answer') }} - {{$language}}" />                        
            <div wire:ignore>
                <textarea                            
                    class="tiny hidden"
                    wire:model.debounce.60s="answer.{{ $key }}"
                    wire:key="answer.{{ $key }}"
                    id="answer_{{ $key }}"
                    name="answer.{{ $key }}"                
                    >                            
                </textarea>   
            </div>
            <x-admin.input-error for="answer.{{ $key }}" class="mt-2" />
        </div>  

        <hr class="my-8 px-4">
    @endforeach
</x-slot>

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