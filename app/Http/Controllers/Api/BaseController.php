<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\Language;
use Illuminate\Http\Request;
use App\Exceptions\InvalidLocaleException;

abstract class BaseController extends Controller
{    
    protected $errorCode;
    protected $locale = null;
    
    protected function successResponse($data) {
        return response()->json([
            'success'   => true,
            'data'      => $data,
        ]);
    }

    protected function errorResponse($error) {
        return response()->json([
            'success'  => false,
            'code'     => $this->errorCode,
            'error'    => $error
        ]);
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
        return $collection->map(function ($item) {
            return $item->toApiResponse();
        });
    }

    protected function checkLocale(Request $request) {
        if($request->has('locale')) {
            if(Language::isAvailableCode($request->input('locale'))) {
                $this->locale = $request->input('locale');
            } else {
                $this->badRequestError();
    
                throw new InvalidLocaleException(); 
            }
        }
    }
}
