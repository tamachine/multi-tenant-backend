<?php

namespace App\Services;

use App\Models\SeoConfiguration;

/**
 * 
 * This class manages seo configurations for the current request
 */
class SeoConfigurations
{
    protected $seoConfigurationInstance;   

    public function __construct() {        
        $this->setSeoConfigurationInstance();                      
    }
    
    /**
     * Returns seoConfigurations if they are defined for the current page
     * 
     * @return App\Models\SeoConfiguration|null
     */
    public function getConfigurations() {
        return $this->seoConfigurationInstance?->SEOConfiguration;
    }    

    /**
     * Sets the instance that corresponds to the page
     */
    protected function setSeoConfigurationInstance() {
        $currentUrl = url()->current();

        foreach(SeoConfiguration::all() as $seoConfiguration) {            
            if($seoConfiguration->instance->seoConfigurationUrl() == $currentUrl) { //check if the url of the seoConfiguration instance is the current one
                $this->seoConfigurationInstance = $seoConfiguration->instance;                
                break;
            }
        } 
    }
}