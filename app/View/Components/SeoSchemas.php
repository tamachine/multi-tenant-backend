<?php

namespace App\View\Components;

use App\Services\SeoConfigurations;

/**
 * This component shows the corresponding meta tags of the page based on SEO Configurations
 */
class SeoSchemas extends SeoTags
{           

    public $schemas;

     /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SeoConfigurations $seoConfigurations)
    {
        parent::__construct($seoConfigurations);

        $this->schemas = $this->configurations?->seoSchemas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.seo-schemas');
    }    
}
