<?php

namespace App\Traits;

use App\Models\SeoConfiguration;

/**
 * This trait manages SEO Configurations
 * NOTE: method seoConfigurationUrl MUST be implemented in the model that uses this trait
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
     * Get the SEO Configurations.
     */
    public function SEOConfigurations()
    {        
        return $this->morphMany(SeoConfiguration::class, 'instance');
    }

    public function scopePage($query, $page_id) {
        return $query->where('page_id', $page_id);
    }  
    
     /**
     * Returns for a given locale the translated slug
     * 
     * @return string
     */
    public function getLocalizedRouteKey($locale)
    {
        throw new \Exception(class_basename($this). ' must implement getLocalizedRouteKey() method for HasSEOConfigurations trait class');
    }
}