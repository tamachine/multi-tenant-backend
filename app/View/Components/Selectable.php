<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\Selectable\SelectableComponentInterface;

class Selectable extends Component
{
    public $selectableComponent;
    public $selectedValue;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SelectableComponentInterface $selectableComponent, $selectedValue = null)
    {
        $this->selectableComponent = $selectableComponent;
        $this->selectedValue = $selectedValue ? $selectedValue : $this->selectableComponent->getDefaultSelectedValue();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.selectable', ['selectedText' => $this->selectableComponent->getSelectedText($this->selectedValue)]);
    }
}
