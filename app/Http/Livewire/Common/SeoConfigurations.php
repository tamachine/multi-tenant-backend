<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\SeoConfiguration;
use App\Helpers\Language;
use App\Models\Page;

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

    protected $pages;

    protected $page;

    public string $pageId;

    public function mount() {           
        $this->setPages();     
        $this->setPage();        
        $this->setSeoConfiguration();       
    }

    protected function rules()
    {
        $validations = [            
            'seoConfiguration.nofollow' => 'nullable|boolean',    
            'seoConfiguration.noindex'  => 'nullable|boolean',                       
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
        $this->setPages();

        $this->page = Page::find($this->pageId);        

        return view('livewire.common.seo-configurations', ['pages' => $this->pages->get(), 'page' => $this->page]);
    }

    public function changePage() {
        $this->setSeoConfiguration();
    }

    protected function setPages() {
        $this->pages = Page::instance($this->instance);
    }

    protected function setPage() {
        if($this->pages->count() > 0) {
            $this->page = $this->pages->first();
        } else {
            $this->page = $this->instance;
        }

        $this->pageId = $this->page->id;
    }

    protected function setSeoConfiguration() {
        $this->seoConfiguration = $this->instance->SEOConfigurations()->where('page_id', $this->pageId)->firstOrCreate(['page_id' => $this->pageId],['page_id' => $this->pageId, 'noindex' => 0, 'nofollow' => 0]);        
    }
}