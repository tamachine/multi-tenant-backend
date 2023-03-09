<?php

namespace App\Http\Livewire\Admin\InsuranceFeature;

use App\Models\InsuranceFeature;
use App\Helpers\Language;
use Livewire\Component;

class Edit extends Component
{

    public $insuranceFeature;

    public $name;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */   

    public function mount(InsuranceFeature $insuranceFeature)
    {
        $this->insuranceFeature = $insuranceFeature;
        
        foreach(Language::availableLanguages() as $key => $language) {
            $this->name[$key] = $this->insuranceFeature->getTranslation('name', $key);
        }    
    }


    public function update()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate(['name.'.Language::defaultCode() => 'required']);

        $this->insuranceFeature->update(['name' => $this->name]);        
        
        $this->dispatchBrowserEvent('open-success', ['message' => 'Insurance feature "' . $this->insuranceFeature->name .'" updated succesfully']);               
    }    
    
    public function delete()
    {
        
        $this->insuranceFeature->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The Insurance feature has been deleted'));

        return redirect()->route('intranet.insurance-feature.index');
        
    }

    public function render()
    {
        return view('livewire.admin.insurance-feature.edit');
    }
}
