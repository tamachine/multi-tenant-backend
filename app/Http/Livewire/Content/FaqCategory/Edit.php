<?php

namespace App\Http\Livewire\Content\FaqCategory;

use App\Models\FaqCategory;
use App\Helpers\Language;

class Edit extends Base
{

    public $faqCategory;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */   

    public function mount(FaqCategory $faqCategory)
    {
        $this->faqCategory = $faqCategory;
        
        foreach(Language::availableLanguages() as $key => $language) {
            $this->name[$key] = $this->faqCategory->getTranslation('name', $key);
        }    
    }


    public function update()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate($this->validationRules());

        $this->faqCategory->update(['name' => $this->name]);        
        
        $this->dispatchBrowserEvent('open-success', ['message' => 'FAQ Category "' . $this->faqCategory->name .'" updated succesfully']);               
    }    
    
    public function delete()
    {
        if($this->faqCategory->canBeDeleted()){        
            $this->faqCategory->delete();

            session()->flash('status', 'success');
            session()->flash('message', __('The FAQCategory has been deleted'));

            return redirect()->route('intranet.content.faq-category.index');
        } else {
            session()->flash('status', 'danger');
            session()->flash('message', 'FAQ Category could not be deleted because only this one is left');

            return redirect()->route('intranet.content.faq-category.edit', $this->faqCategory);
        }
    }

    public function render()
    {
        return view('livewire.content.faq-category.edit');
    }
}
