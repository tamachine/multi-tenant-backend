<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IconText extends Component
{

    /**
     * The icon path.
     *
     * @var string
     */
    public $iconPath;

    /**
     * The text.
     *
     * @var string
     */
    public $text;

    /**
     * The flex direction.
     *
     * @var string
     */
    public $tailwindDirectionClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($iconPath, $text, $tailwindDirectionClass = 'flex-col')
    {
        $this->iconPath = $iconPath;
        $this->text = $text;
        $this->tailwindDirectionClass = $tailwindDirectionClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icon-text');
    }
}
