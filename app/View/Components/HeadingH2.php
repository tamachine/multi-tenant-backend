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
    public $tailwindAlignClass;

    /**
     * The padding between items.
     *
     * @var string
     */
    public $tailwindPaddingClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subtitle, $tailwindAlignClass = 'text-center', $tailwindPaddingClass = 'pt-5')
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->tailwindAlignClass = $tailwindAlignClass;
        $this->tailwindPaddingClass = $tailwindPaddingClass;
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
