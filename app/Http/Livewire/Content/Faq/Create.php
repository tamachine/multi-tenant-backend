<?php

namespace App\Http\Livewire\Content\Faq;

use App\Models\Faq;
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

        $faq = Faq::create(['question' => $this->question, 'answer' => $this->answer]);        
        
        session()->flash('status', 'success');
        session()->flash('message', 'FAQ "' . $faq->question .'" created succesfully');

        return redirect()->route('content.faq.edit', $faq);           
    }    

    public function render()
    {
        return view('livewire.content.faq.create');
    }
}
