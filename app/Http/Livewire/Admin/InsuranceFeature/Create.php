<?php

namespace App\Http\Livewire\Admin\InsuranceFeature;

use Livewire\Component;
use App\Helpers\Language;
use App\Models\InsuranceFeature;

class Create extends Component
{
    public $name;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */   

    public function store()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate(['name.'. Language::defaultCode() => 'required']);

        $insuranceFeature = InsuranceFeature::create(['name' => $this->name]);        
        
        session()->flash('status', 'success');
        session()->flash('message', 'Insurance feature "' . $insuranceFeature->name .'" created succesfully');

        return redirect()->route('intranet.insurance-feature.edit', $insuranceFeature);           
    }    

    public function render()
    {
        return view('livewire.admin.insurance-feature.create');
    }
}
