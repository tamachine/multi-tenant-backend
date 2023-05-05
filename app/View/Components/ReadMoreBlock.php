<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReadMoreBlock extends Component
{  
    /**
     * The text
     *
     * @var string
     */
    public $text;

    /**
     * The text align
     *
     * @var string
     */
    public $reverseTextAlign;

    /**
     * Read more arrow
     *
     * @var string
     */
    public $arrowOpen;


    /**
     * Read less arrow
     *
     * @var string
     */
    public $arrowClose;
    

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $reverseTextAlign = false, $arrowOpen = 'images/icons/read-more.svg', $arrowClose = 'images/icons/read-less.svg')
    {
        $this->text = $text;
        $this->reverseTextAlign = $reverseTextAlign;   
        $this->arrowOpen = $arrowOpen;     
        $this->arrowClose = $arrowClose;     
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.read-more-block');
    }
}
