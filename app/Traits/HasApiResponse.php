<?php

namespace App\Traits;

trait HasApiResponse
{
    public function toApiResponse() {
        
        $apiResponse[] = $this->toArray();
        
        if(isset($this->apiResponse)){
            $apiResponse = [];

            foreach($this->apiResponse as $param) {
                if (isset($this->attributes[$param])) $apiResponse[$param] = $this->jsonResponse($this->attributes[$param]);

                if (in_array($param, $this->appends)) $apiResponse[$param] = $this->jsonResponse($this->$param);
            }            
        }        

        return $apiResponse;
    }    

    protected function jsonResponse($value){
        if (str($value)->isJson()) return json_decode($value); 
        else return $value;
    }
}
