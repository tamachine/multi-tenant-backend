<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Insurance;

class InsuranceBox extends Component
{
    public $insurance;   
    
    public $price;  //price to show. For insurances booking is the price, for landings, is the price_from...

    public $showButton;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Insurance $insurance, int $price, bool $showButton = true)
    {
        $this->insurance = $insurance;        

        $this->price = $price;

        $this->showButton = $showButton;        
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
