<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Faq;
use App\Models\FaqCategory;

class Faqs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {        
        return view(
            'components.faqs', 
            [
                'faqs' => Faq::all(),
                'categories' => FaqCategory::has('faqs')->get(),
            ]
        );
    }
}
