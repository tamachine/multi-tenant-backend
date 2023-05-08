<?php

namespace App\Services\PreferredLanguage;

use App\Helpers\Language;
use App\Services\PreferredLanguage\PreferredLanguage;

/**
 * 
 * This class gets the preferred browser language and assign it to the locale session only when first request occurs
 */
class ApplyPreferredLanguageToLanguageSession
{        
    protected $preferredLanguage;    
    protected $firstRequestSessionName = 'firstRequest';
    
    public function __construct(PreferredLanguage $preferredLanguage) {        
        $this->preferredLanguage = $preferredLanguage->getPreferredLanguage();
        $this->apply();
    }

    /**
     * Apply the prefrred language to the locale session
     */
    protected function apply() {  
        
        $this->checkIfAccessingWithPrefix();

        if($this->firstRequest()) {                                      
            Language::setSession($this->preferredLanguage);            
            $this->notFirstRequestAnyMore();            
        }
    }

    protected function firstRequest() {        
        return (!session()->has($this->firstRequestSessionName));                        
    }

    protected function notFirstRequestAnyMore() {
        session([$this->firstRequestSessionName => time()]);        
    }        

    /**
     * If we access with a prefix, we don't have to check for the user's preferred language
     */
    protected function checkIfAccessingWithPrefix() {
        if(Language::accessingWithPrefixCode()) {               
            $this->notFirstRequestAnyMore();  
        } 
    }
}

?>