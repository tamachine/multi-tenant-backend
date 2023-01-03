<x-admin.form-section submit="render"  formClass="block">
    <x-slot name="title">
        {{ __('Edit FAQ') }}
    </x-slot>

    <x-slot name="description">
        {{ $faq->question }}
    </x-slot>

    <x-slot name="form">       
        <!-- FAQ Category -->
        <div class="px-4 mt-10 md:mt-6">
            <x-admin.label for="faq_category_id" value="{{ __('FAQ Category') }}" />        
            <div class="grid auto-cols-auto mt-1">
                @foreach($categories as $faqCategory) 
                <div class="flex gap-3">     
                    <x-admin.checkbox wire:model="faqCategories.{{ $faqCategory->id }}" wire:click="toggleFaqCategory({{ $faqCategory->id }})" />                                        
                    <x-admin.label for="faqCategory_{{ $faqCategory->id }}" value="{!! $faqCategory->name !!}"/>      
                </div>
                @endforeach
            </div>
        </div>  
    </x-slot>
                                    
</x-admin.form-section>   





