<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\Location;

class LocationsController extends BaseController
{

     /**
     * @lrd:start
     * ## Returns all locations ordered by appearance.
     * @lrd:end           
     */
    public function index():JsonResponse {        
        return $this->successResponse($this->mapApiResponse(Location::orderBy('order_appearance')->get()));
    }


}
