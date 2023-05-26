<?php

namespace App\Traits;

use App\Models\SeoConfiguration;

/**
 * This trait manages SEO Configurations
 */
trait HasSEOConfigurations
{        
    /**
     * Get the SEO Configuration.
     */
    public function SEOConfiguration()
    {
        return $this->morphOne(SeoConfiguration::class, 'instance');
    }
}