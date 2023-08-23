<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController extends BaseController
{

     /**
     * @lrd:start
     * ## Returns all locations ordered by appearance.
     * @QAparam locale string nullable
     * @lrd:end           
     */
    public function index(Request $request):JsonResponse {       
        $this->checkLocale($request);  

        return $this->successResponse($this->mapApiResponse(Location::orderBy('order_appearance')->get()));
    }


}
