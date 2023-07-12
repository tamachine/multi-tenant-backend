<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Insurance;
use App\Models\Feature;
use App\Models\Car;

class InsuranceBox extends Component
{
    public $insurance;
    public $car;
    
    protected $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Insurance $insurance, Car $car)
    {
        $this->insurance = $insurance;
        $this->car       = $car;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.insurance-box', ['features' => Feature::all()]);
    }    
}
