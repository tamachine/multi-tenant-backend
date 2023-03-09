<?php

namespace App\Http\Livewire\Content\FaqCategory;

use App\Models\FaqCategory;
use App\Helpers\Language;

class Create extends Base
{
    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */   

    public function store()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate($this->validationRules());

        $faqCategory = FaqCategory::create(['name' => $this->name]);        
        
        session()->flash('status', 'success');
        session()->flash('message', 'FAQ Category "' . $faqCategory->name .'" created succesfully');

        return redirect()->route('intranet.content.faq-category.edit', $faqCategory);           
    }    

    public function render()
    {
        return view('livewire.content.faq-category.create');
    }
}
