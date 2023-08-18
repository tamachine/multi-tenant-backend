<?php

namespace App\Traits\Controllers\Api;

use App\Models\SeoConfiguration;
use App\Models\Page;

/**
 * This trait manages a unique pdf for an instance
 */
trait HasSeoConfigurations
{   
    public function seoConfigurationsResponse(object $instance, Page $page) {
        $this->checkLocale(request());

        $query = SeoConfiguration::where(['instance_type' => get_class($instance), 'instance_id' => $instance->id ,'page_id' => $page->id])->first();

        if($query) {
            return $this->successResponse($query->toApiResponse());     
        } else {
            $newSeoConfiguration = SeoConfiguration::make(
                [
                    'instance_type' => get_class($instance), 
                    'page_id' => $page->id,
                    'meta_title' => null, 
                    'meta_description' => null, 
                    'noindex' => 0, 
                    'nofollow' => 0, 
                    'lang' => null, 
                    'canonical' => null,                     
                    'instance_id' => $instance->id,                     
                ]);
            return $this->successResponse($newSeoConfiguration->toApiResponse());
        }
    }
}