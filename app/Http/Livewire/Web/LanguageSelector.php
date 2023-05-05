<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App\Helpers\Currency;
use App\Helpers\Language;

class LanguageSelector extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $route;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount() {
        $this->route = request()->route() ? request()->route()->getName() : null;
    }

    public function changeLanguage($code, $urlToRedirect)
    {
        Language::setLanguageInSession($code);
        
        return redirect($urlToRedirect);
    }

    public function changeCurrency($code)
    {
        Currency::setCurrencyInSession($code);

        return redirect()->route($this->route);
    }

    public function render()
    {
        return view('livewire.web.language-selector');
    }
}
