<?php

namespace App\Services;

use App\Services\SeoConfigurations;

/**
 * 
 * This class returns the lang to show in HTML tag
 */
class HTMLLang
{   
    protected $configurations;
    protected $HTMLLang;

    
    public function __construct(SeoConfigurations $seoConfigurations) {        
        $this->configurations = $seoConfigurations->getConfigurations(); //assign the services that manages seo configurations    
        $this->setHTMLLang();                
    }
    
    /**
     * Returns the corresponding lang attribute for the HTML tag
     */
    public function getHTMLLang():string {
        return $this->HTMLLang;
    }

    /**
     * Sets the HTML lang based on seo configurations
     */
    protected function setHTMLLang() {
        $this->HTMLLang = $this->getDefaultLang();

        if($this->configurations !== null) {
            if(!empty($this->configurations->lang)) {
                $this->HTMLLang = $this->configurations->lang;
            }            
        }
    }

    /**
     * Returns the default lang for the HTML tag
     * 
     * @return string
     */
    protected function getDefaultLang() {
        return str_replace('_', '-', app()->getLocale());
    }
}