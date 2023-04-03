<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class BlogFilters extends Component
{
     /**
     * The breadcrumbs array.
     *
     * @var collection
     */
    public $tags;

    public $activeTagHashid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $tags, $activeTagHashid = null)
    {
        $this->tags = $tags;
        $this->activeTagHashid = $activeTagHashid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-filters');
    }
}
