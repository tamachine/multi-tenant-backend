<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Affiliate;
use Illuminate\Http\JsonResponse;
use App\Models\Location;
use Illuminate\Http\Request;

class AffiliatesController extends BaseController
{

     /**
     * @lrd:start
     * ## Returns all affiliates.
     * @QAparam locale string nullable
     * @lrd:end           
     */
    public function index(Request $request):JsonResponse {       
        $this->checkLocale($request);  

        $query = Affiliate::query();

        return $this->successResponse($this->mapApiResponse($query->get()));
    }


}
