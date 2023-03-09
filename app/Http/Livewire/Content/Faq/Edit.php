<?php

namespace App\Http\Livewire\Content\Faq;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Helpers\Language;

class Edit extends Base
{

    public $faq;

    public $faqCategories = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */   

    public function mount(Faq $faq)
    {
        $this->faq = $faq;
        
        foreach(Language::availableLanguages() as $key => $language) {
            $this->question[$key] = $this->faq->getTranslation('question', $key);
            $this->answer[$key] = $this->faq->getTranslation('answer', $key);
        }   
        
        $faqCategoriesIds = $this->faq->faqCategories->pluck('id')->toArray();

        $this->faqCategories = array_fill_keys($faqCategoriesIds, true);
    }

    public function update()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate($this->validationRules());

        $this->faq->update(['question' => $this->question, 'answer' => $this->answer]);        
        
        $this->dispatchBrowserEvent('open-success', ['message' => 'FAQ "' . $this->faq->question .'" updated succesfully']);               
    }    
    
    public function toggleFaqCategory($faqCategoryId) {        
        
        $this->faq->faqCategories()->detach();

        $this->faq->faqCategories()->attach(array_keys($this->faqCategories, true));

        $this->dispatchBrowserEvent('open-success', ['message' => 'FAQ Categories updated succesfully']);                  
    }

    public function delete()
    {        
        $this->faq->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The FAQ has been deleted'));

        return redirect()->route('intranet.content.faq.index');
    }

    public function render()
    {
        return view('livewire.content.faq.edit', ['categories' => FaqCategory::all()]);
    }
}
