<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App;
use App\Helpers\Language;

class LanguageSelector extends Component
{
    public function mount() {
        $this->route = request()->route()->getName();             
    }

    public function changeLanguage($code)
    {     
        Language::setLanguageInSession($code);
                
        return redirect()->route($this->route);
    }

    public function render()
    {
        return view('livewire.web.language-selector');
    }
}