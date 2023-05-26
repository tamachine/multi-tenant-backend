<section>
    <x-admin.form-section submit="save" formClass="block">
        <x-slot name="title">
            {{ __('Edit SEO Configuration') }}
        </x-slot>        

        <x-slot name="description">
            {{ $seoConfiguration->instance->description_for_seo_configurations }}
        </x-slot>

        <x-slot name="form">
            
            <div class="px-4 mt-4">     
                <x-admin.label value="{{ __('nofollow') }}" />             
                <label for="nofollow" class="inline-flex items-center py-2">
                    <x-admin.checkbox id="nofollow" wire:model="seoConfiguration.nofollow" />
                    <span class="ml-3 italic">                        
                        {{ __('Check this option to add a nofllow meta tag to the page') }}
                    </span>                   
                </label>
            </div>
            <hr class="my-8 pb-1 px-4 bg-blue-500">
            <div class="px-4 mt-4"> 
                 
                <x-admin.label value="{{ __('noindex') }}" />             
                <label for="noindex" class="inline-flex items-center py-2">
                    <x-admin.checkbox id="noindex" wire:model="seoConfiguration.noindex" />
                    <span class="ml-3 italic">                        
                        {{ __('Check this option to add a noindex meta tag to the page') }}
                    </span>                    
                </label>
            </div>     
            <hr class="my-8 pb-1 px-4 bg-blue-500">            
            @foreach(App\Helpers\Language::availableLanguages() as $key => $language)
 
                <div class="px-4 mt-4">
                    <x-admin.label for="meta_title_{{$key}}" value="{{ $language }}" /> 
                </div>

                <div class="px-4 mt-4">
                    <x-admin.label for="seoConfiguration_meta_title_{{$key}}" value="{{ __('Meta title') }} " />                                    
                    
                    <x-admin.input id="seoConfiguration_meta_title_{{$key}}" type="text" class="w-full mt-1 block" wire:model.defer="seoConfiguration.meta_title.{{ $key }}" autocomplete="meta_title_text" />
                    
                    <x-admin.input-error for="seoConfiguration.meta_title.{{ $key }}" class="mt-2" />
                </div>

                <div class="px-4 mt-2">
                    <x-admin.label for="seoConfiguration_meta_description_{{$key}}" value="{{ __('Meta description') }}" />                                    
                    
                    <x-admin.input id="seoConfiguration_meta_description_{{$key}}" type="text" class="w-full mt-1 block" wire:model.defer="seoConfiguration.meta_description.{{ $key }}" autocomplete="meta_description_text" />
                    
                    <x-admin.input-error for="seoConfiguration.meta_description.{{ $key }}" class="mt-2" />
                </div> 

                <div class="px-4 mt-2">
                    <x-admin.label for="seoConfiguration_lang_{{$key}}" value="{{ __('Lang') }}" />                                    
                    
                    <x-admin.input id="seoConfiguration_lang_{{$key}}" type="text" class="w-full mt-1 block" name="seoConfiguration.lang.{{ $key }}" wire:model.defer="seoConfiguration.lang.{{ $key }}" autocomplete="lang_text" />
                    
                    <x-admin.input-error for="seoConfiguration.lang.{{ $key }}" class="mt-2" />
                </div> 

                <div class="px-4 mt-2">
                    <x-admin.label for="seoConfiguration_canonical_{{$key}}" value="{{ __('Canonical') }}" />                                    
                    
                    <x-admin.input id="seoConfiguration_canonical_{{$key}}" type="text" class="w-full mt-1 block" wire:model.defer="seoConfiguration.canonical.{{ $key }}" autocomplete="canonical_text" />
                    
                    <x-admin.input-error for="seoConfiguration.canonical.{{ $key }}" class="mt-2" />
                </div> 

                <hr class="my-8 pb-1 px-4 bg-blue-500">   

            @endforeach                    
                         
        </x-slot>

        <x-slot name="actions">
            <x-admin.button wire:loading.attr="disabled">
                {{ __('Save Configurations') }}
            </x-admin.button>
        </x-slot>
    </x-admin.form-section>
</section>