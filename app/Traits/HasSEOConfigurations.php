<?php

namespace App\Traits;

use App\Models\SeoConfiguration;

/**
 * This trait manages SEO Configurations
 * 
 * It is possible to set the attribute $description_for_seo_configurations in order to get the description of the instance
 */
trait HasSEOConfigurations
{        
    public function getDescriptionForSEOConfigurationsAttribute() {
        if(!empty($this->description)) {
            return $this->description;
        } elseif (!empty($this->description_for_seo_configurations)) {
            return $this->description_for_seo_configurations;
        } else {
            return $this->hashid;
        }
    }
    
    /**
     * Get the SEO Configuration.
     */
    public function SEOConfiguration()
    {
        return $this->morphOne(SeoConfiguration::class, 'instance');
    }
    
}