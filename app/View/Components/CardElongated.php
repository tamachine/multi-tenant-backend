<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardElongated extends Component
{
     /**
     * The image path.
     *
     * @var string
     */
    public $backgroundRelativePath;

    /**
     * The title
     *
     * @var string
     */
    public $title;

    /**
     * The text
     *
     * @var string
     */
    public $text;

    /**
     * The text to show after the clock icon
     *
     * @var string
     */
    public $time;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($backgroundRelativePath, $title, $text, $time)
    {
        $this->backgroundRelativePath = $backgroundRelativePath;
        $this->title = $title;
        $this->text = $text;
        $this->time = $time;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-elongated');
    }
}
