<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\SeoConfigurations;

/**
 * This component shows the corresponding meta tags of the page based on SEO Configurations
 */
class SeoTags extends Component
{        
    protected $seoConfigurations;

    public $configurations;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SeoConfigurations $seoConfigurations)
    {
        $this->seoConfigurations = $seoConfigurations;
        
        $this->configurations = $this->seoConfigurations->getConfigurations();
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.seo-tags');
    }    
}
