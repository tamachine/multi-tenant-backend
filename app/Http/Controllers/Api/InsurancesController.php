<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Insurance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InsurancesController extends BaseController
{

    /**     
     * @lrd:start
     * ## Returns all insurances
     * @lrd:end
     * @QAparam locale string nullable 
     */
    public function index(Request $request):JsonResponse {

        $query = Insurance::query();        
       
        $this->checkLocale($request);        

        return $this->successResponse($this->mapApiResponse($query->get()));                
    }   

}
