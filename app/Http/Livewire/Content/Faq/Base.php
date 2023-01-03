<?php

namespace App\Http\Livewire\Content\Faq;

use App\Models\Faq;
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
    public $question;   
    
    /**
     * @var array
     */
    public $answer;  
    
    protected function validationRules() {
        return [
            'question.'.Language::defaultCode() => 'required',            
            'answer.'.Language::defaultCode() => 'required',
        ];
    }
}
