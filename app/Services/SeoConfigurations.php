<?php

namespace App\Services;

use App\Models\SeoConfiguration;
use Illuminate\Support\Facades\Route;
use App;

/**
 * 
 * This class manages seo configurations for the current request
 */
class SeoConfigurations
{
    protected $seoConfiguration;   

    public function __construct() {        
        $this->setSeoConfiguration();                      
    }
    
    /**
     * Returns seoConfigurations if they are defined for the current page
     * 
     * @return App\Models\SeoConfiguration|null
     */
    public function getConfigurations() {
        return $this->seoConfiguration;
    }    

    /**
     * Sets the instance that corresponds to the page
     */
    protected function setSeoConfiguration() {
        $currentUrl = url()->current();

        foreach(SeoConfiguration::all() as $seoConfiguration) {                
            if($seoConfiguration->page->url($seoConfiguration->instance->getLocalizedRouteKey(App::getLocale())) == $currentUrl) { //check if the url of the seoConfiguration instance is the current one
                $this->seoConfiguration = $seoConfiguration;                
                break;
            }
        }         
    }
}