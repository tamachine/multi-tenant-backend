<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Insurance;

class InsuranceBox extends Component
{
    public $insurance;    

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Insurance $insurance)
    {
        $this->insurance = $insurance;        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.insurance-box');
    }    
}
