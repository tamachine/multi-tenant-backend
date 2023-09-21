<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Language;
use Illuminate\Http\Request;
use App\Helpers\Api;
use Illuminate\Support\Collection;

abstract class BaseController extends Controller
{    
    protected $errorCode;
    protected $locale = null;
    
    protected function successResponse($data) {
        return response()->json([
            'success'   => true,
            //'count'     => count($data),
            'data'      => $data,
        ]);
    }

    protected function errorResponse($error) {
        return Api::errorResponse($this->errorCode, $error);        
    }

    protected function notFoundError() {        
        $this->errorCode = 404;        
    }

    protected function badRequestError() {        
        $this->errorCode = 400;        
    }

    protected function castBool($string):bool {
        return filter_var($string, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * maps a collection based on toApiResponse model method (HasApiResponse)
     */
    protected function mapApiResponse($collection) {
        return Api::mapApiRepsonse($collection, $this->locale);        
    }

    /**
     * adds extra attributes that comes from the data collection instead of the model instance  
     *    
     * @param Collection $collection
     * @param Array $params
     * @param string $attributeToFind
     * 
     * @return Collection $newCollection 
     */
    protected function mapApiResponseWithExtraParams($collection, array $params, $attributeToFind = 'hashid') {        
        $newCollection = collect($this->mapApiResponse($collection));
        
        $newCollection = $newCollection->map(function ($object, $key) use ($collection, $params, $attributeToFind) {
            $originalObject = $collection->where($attributeToFind, $object[$attributeToFind])->first(); 

            foreach($params as $param) {
                $object[$param] = $originalObject->$param;    
            }            
            
            return $object;
        });

        return $newCollection;

    }    

    protected function checkLocale(Request $request) {
        if($request->has('locale')) {
            if(Language::isAvailableCode($request->input('locale'))) {
                $this->locale = $request->input('locale');
            } else {
                $this->locale = Language::defaultCode();
            }
        }
    }

    protected function addAttributesToApiResponse(object &$instance, array $attribute) {                
        $instance->setApiResponse(array_merge($instance->getApiResponse(), $attribute));
    }    
}
