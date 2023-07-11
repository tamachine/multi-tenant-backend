<?php

namespace App\Http\Livewire\Admin\Extra;

use App\Models\Insurance;
use App\Models\Feature;
use Livewire\Component;

class Features extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Insurance
     */
    public $insurance;

    public $allFeatures;

    public $insuranceFeatures;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Insurance $insurance)
    {
        $this->insurance = $insurance;        

        $this->allFeatures = Feature::all();

        $this->insuranceFeatures = $insurance->features()->pluck('hashid');        
    }   

    public function saveFeatures() {
        
        $insuranceFeaturesIds = Feature::whereIn('hashid', $this->insuranceFeatures)->pluck('id');
        
        $this->insurance->features()->sync($insuranceFeaturesIds);

        $this->dispatchBrowserEvent('open-success', ['message' => 'The features have been saved']);
    }

    public function render()
    {
        return view('livewire.admin.extra.features');
    }
}
