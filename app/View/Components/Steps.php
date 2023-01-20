<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Steps extends Component
{
    public $active;

    public $mobile;

    protected $steps;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active = null, $mobile = false)
    {        
        $this->active = $active;
        $this->mobile = $mobile;

        $this->setSteps();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.steps', ['steps' => $this->steps]);
    }

    protected function setSteps() {
        if ($this->mobile) {
            $this->steps = [1 => 'Insurance', 2 => 'Extras', 3 => 'Summary', 4 => 'Personal Details'];
        } else {
            $this->steps = [1 => 'Insurance', 2 => 'Extras', 3 => 'Personal Details'];
        }
    }
}
