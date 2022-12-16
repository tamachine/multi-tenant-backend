<?php

namespace App\Http\Livewire\Content\Translation;

use App\Models\Translation;
use Livewire\Component;
use App\Helpers\Language;

class Edit extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Translation
     */
    public $translation;

    /**
     * @var string
     */
    public $full_key;
    
    /**
     * @var array
     */
    public $text;    
    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Translation $translation)
    {
        $this->translation = $translation;

        $this->full_key = $this->translation->full_key;               
        $this->text = $this->translation->text;            
    }

    public function update()
    {        
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'text.'.Language::defaultCode() => ['required'],
        ]);

        $this->fillAllLanguages();

        $this->translation->update([
            'text' => array_filter($this->text),            
        ]);

        $this->dispatchBrowserEvent('open-success', ['message' => 'Translation "' . $this->full_key .'" updated']);        
    }    

    public function render()
    {
        return view('livewire.content.translation.edit');
    }

    protected function fillAllLanguages() {
        foreach(Language::availableCodes() as $code) {
            if(!isset($this->text[$code]) || empty($this->text[$code])){
                $this->text[$code] = $this->text[Language::defaultCode()];
            }
        }
    }
}
