<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\SeoConfiguration;
use App\Helpers\Language;
use App\Models\Page;
use App\Models\SeoSchema;
use Illuminate\Support\Arr;

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

    public array $seoSchemas = [];    

    public array $newSchema = [];    

    protected $pages;

    protected $page;

    public string $pageId;
    
    public $seotab = 'basic';

    protected $queryString = ['seotab'];

    public function mount() {           
        $this->setPages();     
        $this->setPage();        
        $this->setSeoConfiguration();       
        $this->setSchemas();        
        $this->initNewSchema();               
    }

    protected function rules()
    {
        $validations = [            
            'seoConfiguration.nofollow' => 'nullable|boolean',    
            'seoConfiguration.noindex'  => 'nullable|boolean',                
        ];

        $validationForSchemaType = 'required_with:';

        foreach(Language::availableCodes() as $code) {
            $validations['seoConfiguration.meta_title.'.$code] = 'nullable|string|max:60';
            $validations['seoConfiguration.meta_description.'.$code] = 'nullable|string|max:160';
            $validations['seoConfiguration.lang.'.$code] = 'nullable|string|max:100';
            $validations['seoConfiguration.canonical.'.$code] = 'nullable|url';           
            $validations['seoSchemas.*.'.$code] = 'nullable|json';   
            $validations['newSchema.'.$code] = 'nullable|json';   
            
            $validationForSchemaType .= 'newSchema.'.$code.',';
        }
        
        rtrim($validationForSchemaType, ",");

        $validations['newSchema.type'] = $validationForSchemaType;        

        return $validations;
    }

    public function save()
    {
        $this->validate();        
 
        $this->seoConfiguration->save();

        foreach($this->seoSchemas as $hasid => $schema) {
            foreach(Language::availableCodes() as $code) {
                $this->seoConfiguration->seoSchemas()->findByHashid($hasid)->setTranslation('schema', $code, json_decode($schema[$code]))->save();
            }
        }

        if($this->newSchema['type']) {
            $newSchema = $this->seoConfiguration->seoSchemas()->create(['type' => $this->newSchema['type'], 'schema' => '' ]);   

            foreach(Language::availableCodes() as $code) {
                $newSchema->setTranslation('schema', $code, json_decode($this->newSchema[$code]));
            }

            $newSchema->save();

            $this->seoConfiguration->refresh();
            
            $this->initNewSchema();
            $this->setSchemas();
        }

        $this->dispatchBrowserEvent('open-success', ['message' => 'SEO Configuration updated succesfully']); 
    }

    public function render()
    {        
        $this->setPages();

        $this->page = Page::find($this->pageId);        

        return view('livewire.common.seo-configurations', ['pages' => $this->pages->get(), 'page' => $this->page, 'schemaTypes' => config('seo-schemas')]);
    }

    public function changePage() {
        $this->setSeoConfiguration();
    }

    public function deleteSchema($hashid) {
        SeoSchema::findByHashid($hashid)->delete();

        unset($this->seoSchemas[$hashid]);

        $this->seotab = 'schemas';
                
        $this->dispatchBrowserEvent('open-success', ['message' => 'Schema deleted succesfully']); 
        
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

    protected function setSchemas() {
        foreach(Language::availableCodes() as $code) {
            foreach($this->seoConfiguration->seoSchemas as $seoSchema) {            
                $schemaTranslation = $seoSchema->getTranslation('schema', $code);

                $this->seoSchemas[$seoSchema->hashid][$code] = ($schemaTranslation == "") ? "" : json_encode($schemaTranslation, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
                $this->seoSchemas[$seoSchema->hashid]['type'] = $seoSchema->type;
            }                          
        }
    }

    protected function initNewSchema() {
        foreach(Language::availableCodes() as $code) {           
            $this->newSchema[$code]  = '';
            $this->newSchema['type'] = null;
        }
    }
}