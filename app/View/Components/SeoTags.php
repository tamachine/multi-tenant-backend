<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Model\Page;
use Route;

/**
 * This component shows the corresponding meta tags of the page based on SEO Configurations
 */
class SeoTags extends Component
{
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $page = Page::routeName(Route::currentRouteName());

        if($page->count() == 1) {

        }
        
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
