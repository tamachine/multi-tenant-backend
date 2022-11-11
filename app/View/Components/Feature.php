<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Feature extends Component
{
    /**
     * The text
     *
     * @var string
     */
    public $text;

    /**
     * The title
     *
     * @var string
     */
    public $title;

    /**
     * The image path
     *
     * @var string
     */
    public $imagePath;

    /**
     * The flex direction on desktop.
     *
     * @var string
     */
    public $tailwindDesktopDirectionClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $text, $imagePath, $tailwindDesktopDirectionClass = 'flex-row')
    {
        $this->title = $title;
        $this->text = $text;
        $this->imagePath = $imagePath;
        $this->tailwindDesktopDirectionClass = $tailwindDesktopDirectionClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(
            'components.feature', 
            [
                'textAlign'  => $this->tailwindDesktopDirectionClass == 'flex-row' ? 'text-right' : 'text-left',
                'itemsClass' => $this->tailwindDesktopDirectionClass == 'flex-row' ? 'items-end' : 'items-start',
                'paddingCol1' => $this->tailwindDesktopDirectionClass == 'flex-row' ? 'md:pl-16' : '',
                'paddingCol2' => $this->tailwindDesktopDirectionClass == 'flex-row' ? '' : 'md:ml-16',
            ]);
    }
}
