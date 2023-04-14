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
     * The image hover path
     *
     * @var string
     */
    public $backgroundHoverRelativePath;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($backgroundRelativePath, $title, $text, $time, $backgroundHoverRelativePath = null)
    {
        $this->backgroundRelativePath = $backgroundRelativePath;
        $this->backgroundHoverRelativePath = $backgroundHoverRelativePath;
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
        return view(
            'components.card-elongated', 
            [
                'hover' => $this->backgroundHoverRelativePath ?? $this->backgroundRelativePath ,
                'image' => $this->backgroundRelativePath 
            ]
        );
    }
}
