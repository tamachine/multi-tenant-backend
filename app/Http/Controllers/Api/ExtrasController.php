<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Extra;
use App\Models\Feature;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExtrasController extends BaseController
{

    /**     
     * @lrd:start
     * ## Returns all extras
     * @lrd:end
     * @QAparam locale string nullable 
     */
    public function index(Request $request):JsonResponse {

        $query = Extra::query();        
       
        $this->checkLocale($request);        

        return $this->successResponse($this->mapApiResponse($query->get()));                
    }

    /**
     * @lrd:start
     * ## Returns one extra
     * ## extra_hashid: hashid of the extra
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function show(Extra $extra):JsonResponse {        

        $this->checkLocale(request());        

        return $this->successResponse($extra->toApiResponse($this->locale));        
    }    

}
