<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\SeoConfiguration;
use App\Helpers\Language;

/**
 * This component manages the seo configuration for a given object that uses the HasSEOConfigurations trait
 */
class SeoConfigurations extends Component
{    
    /** PARAMS */
    /**
     * The instance of the seoConfiguration 
     * The model must use HasSEOConfiguration trait
     */
    public object $instance;

    /** END PARAMS */

    /** PUBLIC ATTRIBUTES */
    /**
     * The seo configuration object
     */
    public SeoConfiguration $seoConfiguration;

    public function mount() {                        
        $this->seoConfiguration = $this->instance->SEOConfiguration()->firstOrCreate();                    
    }

    protected function rules()
    {
        $validations = [            
            'seoConfiguration.nofollow' => 'boolean',    
            'seoConfiguration.noindex'  => 'boolean',   
        ];

        foreach(Language::availableCodes() as $code) {
            $validations['seoConfiguration.meta_title.'.$code] = 'nullable|string|max:100';
            $validations['seoConfiguration.meta_description.'.$code] = 'nullable|string|max:100';
            $validations['seoConfiguration.lang.'.$code] = 'nullable|string|max:100';
            $validations['seoConfiguration.canonical.'.$code] = 'nullable|url';           
        }
        
         return $validations;
    }

    public function save()
    {
        $this->validate();
 
        $this->seoConfiguration->save();

        $this->dispatchBrowserEvent('open-success', ['message' => 'SEO Configuration updated succesfully']); 
    }

    public function render()
    {
        return view('livewire.common.seo-configurations');
    }
}