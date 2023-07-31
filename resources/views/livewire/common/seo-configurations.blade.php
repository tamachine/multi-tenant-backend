<section x-data="{ seotab: '{{ $seotab }}' }" x-query-string="seotab">    
    <x-admin.form-section submit="save" formClass="block">
        <x-slot name="title">
            {{ __('Edit SEO Configuration') }}
        </x-slot>        

        <x-slot name="description">
            {{ $seoConfiguration->instance->description_for_seo_configurations }}            

            @if($pages->count() > 0)
                <!-- pages -->
                <div class="mt-8 md:mt-4">
                    <x-admin.label for="open_to" value="{{ __('Pages') }}" />

                    <select id="pageId" name="pageId" wire:model="pageId" wire:change="changePage"
                        class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                    >
                        @foreach ($pages as $page_in_pages)
                            <option value="{{ $page_in_pages->id }}">[{{ $page_in_pages->route_name }}]: {{ $page_in_pages->description_for_seo_configurations }} </option>
                        @endforeach
                    </select>

                    <x-admin.input-error for="pageId" class="mt-2" />
                </div>
            @endif
        </x-slot>

        <x-slot name="form">
            {{-- menu --}}
            <div class="border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
                    <li class="mr-2">
                        <a href="javascript:void(0)"                            
                            @click.prevent="seotab='basic'"                     
                            class="inline-flex p-4 rounded-t-lg border-b-2"
                            :class="seotab == 'basic' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                class="mr-2 w-5 h-5"
                                :class="seotab == 'basic' ? 'text-blue-600' : 'text-gray-400'"
                                >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                            </svg>
                            Basic configurations
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javascript:void(0)"                            
                            @click.prevent="seotab='schemas'" 
                            class="inline-flex p-4 rounded-t-lg border-b-2"
                            :class="seotab == 'schemas' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                class="mr-2 w-5 h-5"
                                :class="seotab == 'schemas' ? 'text-blue-600' : 'text-gray-400'"
                                >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                            </svg>
                            Schemas
                        </a>
                    </li>
                </ul>
            </div>
            {{-- end menu --}}

            <div class="w-full h-full flex items-center justify-center">
                <x-admin.wire-spinner wire:target="pageId"/>    
            </div>
                  
            {{-- seo configurations --}}
            <div x-show="seotab == 'basic'" x-cloak>
                <div wire:loading.remove wire:target="pageId">
                    <div class="px-4 mt-4">     
                        <p class="mt-1 font-bold">
                            {{ $page->route_name }}
                        </p>
                    </div>

                    <hr class="my-8 pb-1 px-4 bg-blue-500">

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
                            
                </div>
            </div>

            {{-- schemas --}}
            <div x-show="seotab == 'schemas'" x-cloak>
                <div wire:loading.remove wire:target="pageId">
                    <div class="px-4 mt-4">     
                        <p class="mt-1 font-bold">
                            {{ $page->route_name }}
                        </p>
                    </div>      

                    {{-- new schema --}}
                    <div class="mt-4 bg-white p-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" x-data="{ showSchemas:true }">
                        <h1 class="text-lg text-green-700 font-bold cursor-pointer hover:underline w-full"  x-on:click="showSchemas = !showSchemas">
                            New Schema
                        </h1>                            
                        
                        <div x-cloak x-show="showSchemas" x-transition.duration.500ms>
                            <div class=" mt-4" >  
                                <select id="newSchema.type" name="newSchema.type"
                                    class="disable-arrow block h-10 pt-2 px-3 text-left border-gray-300 rounded-md"
                                    wire:model.defer="newSchema.type"
                                >              
                                    <option>Select type</option>                      
                                    @foreach ($schemaTypes as $schemaType)
                                    <option value="{{ $schemaType }}">{{ $schemaType }}</option>
                                    @endforeach
                                </select>

                                <x-admin.input-error for="newSchema.type" class="mt-2" />        
                            </div>

                            @foreach(App\Helpers\Language::availableLanguages() as $key => $language)    
                                
                            <div class=" mt-4" >     
                                <x-admin.label for="newSchema_{{ $key }}" value="New Schema - {{ $language }}" />   

                                <textarea class="w-full h-full bg-slate-100" wire:model.defer="newSchema.{{ $key }}" ></textarea>    

                                <x-admin.input-error for="newSchema.{{ $key }}" class="mt-2" />                                                            
                            </div>  
                                                            
                            @endforeach
                            
                        </div> 
                    </div>                        
                    
                    {{-- current schemas --}}
                    @foreach($seoSchemas as $hashid => $seoSchema)
                    
                        <div class="mt-4 bg-white p-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg" x-data="{ showSchemas:false }">
                            <h1 class="text-lg text-green-700 font-bold cursor-pointer hover:underline w-full"  x-on:click="showSchemas = !showSchemas" wire:loading.remove wire:target="deleteSchema('{{ $hashid }}')">
                                {{ $seoSchema['type'] }}
                            </h1>

                            <x-admin.wire-spinner class="w-full h-full" wire:target="deleteSchema('{{ $hashid }}')"/>
                            
                            <div x-cloak x-show="showSchemas" x-transition.duration.500ms wire:loading.remove wire:target="deleteSchema('{{ $hashid }}')">
                            @foreach(App\Helpers\Language::availableLanguages() as $key => $language)       
                                <div class=" mt-4" >     
                                    <x-admin.label for="seoSchemas_{{ $hashid }}_{{ $key }}" value="{{ $seoSchema['type'] }} - {{ $language }}" />   

                                    <textarea class="w-full h-96 bg-slate-100" wire:model.defer="seoSchemas.{{ $hashid }}.{{ $key }}" ></textarea>    

                                    <x-admin.input-error for="seoSchemas.{{ $hashid }}.{{ $key }}" class="mt-2" />                                                            
                                </div>  
                                                                
                            @endforeach
                                <x-admin.delete-item
                                    trigger="Delete {{ $seoSchema['type'] }} Schema"
                                    title="Delete {{ $seoSchema['type'] }} Schema"
                                    class="inline-flex items-center mt-4 px-4 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-red-700 hover:text-red-700 active:bg-white active:border-red-700 active:text-red-700 disabled:opacity-25 transition ease-in-out duration-150"
                                    name="{{ $seoSchema['type'] }}"
                                    hashid="{{ $hashid }}"
                                    event="delete-schema"
                                />
                            </div> 
                        </div>                        

                    @endforeach
                    
                </div>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-admin.button wire:loading.remove>
                {{ __('Save Schemas') }}
            </x-admin.button>
        </x-slot>
    </x-admin.form-section>
</section>

@push('scripts')
    <script>
        window.addEventListener('delete-schema', event => {
            @this.call('deleteSchema', event.detail.hashid)
        });
    </script>
@endpush