<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReadMoreBlock extends Component
{
    /**
     * The line clamp for the text
     *
     * @var string
     */
    public $lineClampTailwindClass;

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
    public $textAlignDesktop;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $textAlignDesktop = 'text-left', $lineClampTailwindClass = 'line-clamp-6')
    {
        $this->text = $text;
        $this->textAlignDesktop = $textAlignDesktop;
        $this->lineClampTailwindClass = $lineClampTailwindClass;
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
