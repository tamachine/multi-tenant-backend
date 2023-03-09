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
    
     /**
     * @var boolean
     */
    public $rich; 
    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Translation $translation) {
        $this->translation = $translation;

        $this->full_key = $this->translation->full_key;               
        $this->text = $this->translation->text;            
        $this->rich = $this->translation->rich;      
    }

    public function check() {
        $this->validate([
            'rich' => ['boolean'],
        ]);                   
                
        $this->translation->update([
            'rich' => $this->rich,              
        ]);

        $this->updateTexts();

        session()->flash('status', 'success');
        session()->flash('message', 'rich text updated');

        return redirect()->route('intranet.content.translation.edit', $this->translation);
    }

    public function update() {        
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'text.'.Language::defaultCode() => ['required'],
        ]);

        $this->updateTexts();

        $this->dispatchBrowserEvent('open-success', ['message' => 'Translation "' . $this->full_key .'" updated']);        
    }    

    public function render() {
        return view('livewire.content.translation.edit');
    }

    public function cancel() {
        $this->rich = true;
    }

    protected function updateTexts() {
        $this->fillAllLanguages();
        $this->stripTags();
        
        $this->translation->update([
            'text' => $this->text,            
        ]);
    }

    protected function fillAllLanguages() {
        foreach(Language::availableCodes() as $code) {
            if(!isset($this->text[$code]) || empty($this->text[$code])){
                $this->text[$code] = $this->text[Language::defaultCode()];
            }
        }
    }

    protected function stripTags() {
        if(!$this->rich) {
            $this->text = array_map(function($v){
                return (strip_tags($v));
            }, $this->text);
        }
    }
}
