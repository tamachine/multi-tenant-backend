<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class PostsSummary extends Component
{
     /**
     * The posts summary.
     *
     * @var Collection
     */
    public $blogPosts;

     /**
     * The title of the summary.
     *
     * @var string
     */
    public $title;

     /**
     * The link for the view all button
     *
     * @var boolean
     */
    public $viewAllHref;    

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $blogPosts, $title, $viewAllHref = null)
    {
        $this->blogPosts = $blogPosts;
        $this->title     = $title;
        $this->viewAllHref = $viewAllHref;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.posts-summary.posts-summary');
    }
}
