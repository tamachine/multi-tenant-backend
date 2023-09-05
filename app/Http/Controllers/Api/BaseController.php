<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Language;
use Illuminate\Http\Request;
use App\Helpers\Api;

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

    protected function changeKey(&$array, $originalKey, $newKey) {
        if(isset($array[$originalKey])) {
            $array[$newKey] = $array[$originalKey];

            unset($array[$originalKey]);
        }
    }
}
