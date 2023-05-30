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
     * Get the SEO Configuration.
     */
    public function SEOConfiguration()
    {        
        return $this->morphMany(SeoConfiguration::class, 'instance');
    }

    public function scopePage($query, $page_id) {
        return $query->where('page_id', $page_id);
    }

    /**
     * Define the url that the model will have
     * As traits cannot implement interfaces, we through an exception
     * 
     * @return string url of the model
     */
    public function seoConfigurationUrl() {
        throw new \Exception('define url in '. class_basename($this) . ' class');
    }
    
}