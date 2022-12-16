<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App;

class LanguageSelector extends Component
{
    public function mount() {
        $this->route = url()->previous();        
    }

    public function changeLanguage($code)
    {     
        if(in_array($code, array_keys(config('languages')))) {
            session(['applocale' => $code]);
        }
        
        return redirect($this->route);
    }

    public function render()
    {
        return view('livewire.web.language-selector');
    }
}
