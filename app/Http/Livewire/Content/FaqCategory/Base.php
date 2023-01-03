<?php

namespace App\Http\Livewire\Content\FaqCategory;

use App\Models\FaqCategory;
use Livewire\Component;
use App\Helpers\Language;

abstract class Base extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var array
     */
    public $name;      
    
    protected function validationRules() {
        return [
            'name.'.Language::defaultCode() => 'required',
            'name.*' => 'string|max:20'
        ];
    }
}
