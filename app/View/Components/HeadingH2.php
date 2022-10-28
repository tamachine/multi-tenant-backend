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
     * The flex direction.
     *
     * @var string
     */
    public $tailwindAlignClass = "text-center";

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subtitle, $tailwindAlignClass = 'text-center')
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->tailwindAlignClass = $tailwindAlignClass;
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
