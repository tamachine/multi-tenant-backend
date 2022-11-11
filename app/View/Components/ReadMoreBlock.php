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
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $reverseTextAlign = false)
    {
        $this->text = $text;
        $this->reverseTextAlign = $reverseTextAlign;        
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
