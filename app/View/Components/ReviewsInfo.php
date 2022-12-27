<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\ReviewsInfo\ReviewsInfoComponentInterface;

class ReviewsInfo extends Component
{

    public $reviewInfoComponent;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ReviewsInfoComponentInterface $reviewInfoComponent)
    {
        $this->reviewInfoComponent = $reviewInfoComponent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.reviews-info');
    }
}
