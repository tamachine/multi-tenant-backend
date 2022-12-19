<?php

namespace App\Services\PreferredLanguage;

use App\Helpers\Language;

/**
 * 
 * This class gets the preferred browser language 
 */
class PreferredLanguage
{        
    protected $acceptedLanguages;
    protected $languages = []; //[es, en;q=0.9, ak;q=0.8]  
    protected $languageCode;
    protected $preferredLanguage;

    public function __construct() {
        $this->setAcceptedLanguages();
        $this->setLanguages();
        $this->setLanguageCode();
        $this->setPreferredLanguage();
    }

    public function getPreferredLanguage() {
        return $this->preferredLanguage;
    }

    //get the browser language
    //it can return one or multiple languages split by a comma
    protected function setAcceptedLanguages() {        
        $this->acceptedLanguages = request()->server('HTTP_ACCEPT_LANGUAGE'); //es,en;q=0.9,ak;q=0.8   
    }

    protected function setLanguages() {
        //split it by the comma char to get all preferred languages
        $this->languages = explode(",", $this->acceptedLanguages); //[es, en;q=0.9, ak;q=0.8] 
    }

    protected function setLanguageCode() {        
        foreach($this->languages as $language) {     
            $this->languageCode = $this->getLanguageCode($language);

            if($this->languageCode) {                
                break;
            }                        
        }           
    }

    protected function setPreferredLanguage() {        
        $this->preferredLanguage = $this->languageCode ?? Language::defaultCode();
    }

    protected function getLanguageCode($language) {
        foreach(Language::availableCodes() as $code){ 
            if ($this->codeIsInTheLanguageString($code, $language)) {      
                return $code;
            }
        }
    }

    protected function codeIsInTheLanguageString($code, $language) {
        return (strpos($language, $code) !== false);         
    }
}

?>