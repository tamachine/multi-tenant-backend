<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HeadingH2 extends Component
{
    /**
     * The icon path.
     *
     * @var string
     */
    public $title;

    /**
     * The text.
     *
     * @var string
     */
    public $subtitle;

    /**
     * The text direction.
     *
     * @var string
     */
    public $textDirection;

    /**
     * The padding between items.
     *
     * @var string
     */
    public $paddingTop;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subtitle, $textDirection = 'center', $paddingTop = '5')
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->textDirection = $textDirection;
        $this->paddingTop = $paddingTop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.heading-h2');
    }
}
