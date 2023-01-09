<?php

namespace App\Traits;

/**
 * This trait, generates a toApiResponse() method similar to toArray() method with all the attributes, appends or methods included in $apiResponse array:
 * 
 * use App\Traits\HasApiResponse;
 * 
 * class Translation extends LanguageLine
 * {
 * 
 *  use HasApiResponse;
 * 
 *  protected $apiResponse = ['hashid', 'full_key', 'text']; //attributes, appends or methods
 * 
 *  ...
 */

trait HasApiResponse
{
    public function toApiResponse(): array {
        
        $apiResponse[] = $this->toArray();
        
        if(isset($this->apiResponse)){
            $apiResponse = [];

            foreach($this->apiResponse as $param) {
                if (isset($this->attributes[$param])) { //its an attribute
                    $apiResponse[$param] = $this->jsonResponse($this->attributes[$param]);
                } elseif (in_array($param, $this->appends)) { //its an append attribute
                    $apiResponse[$param] = $this->jsonResponse($this->$param);
                } elseif (method_exists($this, $param)) {  //its a method
                    $apiResponse[$param] = $this->jsonResponse($this->$param());               
                }                
            }            
        }        

        return $apiResponse;
    }    

    protected function jsonResponse($value){
        if (str($value)->isJson()) return json_decode($value); 
        else return $value;
    }
}
