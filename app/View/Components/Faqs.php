<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Faq;
use App\Models\FaqCategory;

class Faqs extends Component
{

    const NUM_FAQS = 5; //num of max faqs per category when view all button is shown

    /**
     * If true, all faqs without the View all button wil be shown.
     * If false, only 5 responses by category will be shown
     *
     * @var string
     */
    public $allFaqs;

     /**    
     *
     * @var string
     */
    public $isFaqsPage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $allFaqs = false, $isFaqsPage = false)
    {
        $this->allFaqs = $allFaqs;
        $this->isFaqsPage = $isFaqsPage;
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
                'showViewAllButton' => !$this->allFaqs,
                'take' => $this->allFaqs ? null : self::NUM_FAQS,
            ]
        );
    }
        
}
