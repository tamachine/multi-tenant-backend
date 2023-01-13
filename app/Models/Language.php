<?php

namespace App\Models;

use App\Helpers\Language as LanguageHelper;
use App\Traits\HasApiResponse;

class Language {

    public $id;
    public $text;    
    
    use HasApiResponse;

    protected $apiResponse = ['id', 'text'];
    
    public static function all() {
        $codes = LanguageHelper::availableCodes();

        foreach($codes as $code) {
            $language = new Language();
            $language->id = $code;                
            
            foreach(LanguageHelper::availableCodes() as $code) {
                $text[$code] = __('general.languages-'.$code, [], $code);                
            }            
            
            $language->text = $text; 
                                    
            $all[] = $language;
        }

        return collect($all);
    }

    public function getTextTranslated() {
        return $this->text[App::getLocale()];
    }
}
