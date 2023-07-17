<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Feature;

class InsurancesTable extends Component
{
    public $insurances;

    public $features;

    public $isLanding = false;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $insurances, bool $isLanding = false)
    {        
        $this->insurances = $insurances;

        $this->features   = Feature::all();

        $this->isLanding = $isLanding;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.insurances-table');
    }
}
