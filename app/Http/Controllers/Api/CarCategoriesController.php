<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\CarType;
use App\Models\CarTransmission;
use App\Models\CarRoad;
use App\Models\CarSeat;
use Illuminate\Http\Request;

class CarCategoriesController extends BaseController
{

     /**
     * @lrd:start
     * ## Returns all categories for cars
     * @lrd:end       
     * @QAparam locale string nullable    
     */
    public function index(Request $request):JsonResponse {
        $this->checkLocale($request);        

        $query = CarType::all();    
        
        return $this->successResponse($this->mapApiResponse($query));      
    }

    /**
     * @lrd:start
     * ## Returns a specific filter. {car_filter_id} can be: 'types', 'transmissions' or 'roads'z
     * @lrd:end          
     */
    public function show($car_filter_id) {
        switch($car_filter_id) {
            case 'types':
                $filters = $this->getTypes();
                break;
            case 'transmissions':
                $filters = $this->getTransmissions();
                break;
            case 'roads':
                $filters = $this->getRoads(); 
                break;
            case 'seats':
                $filters = $this->getSeats(); 
                break;
            default:
                $this->notFoundError();

                return $this->errorResponse("filter '$car_filter_id' does not exist");
        }

        return $this->successResponse($filters);        
    }

    protected function getTypes() {
        return $this->mapApiResponse(CarType::all($this->locale));
    }

    protected function getTransmissions() {
        return $this->mapApiResponse(CarTransmission::all($this->locale));
    }

    protected function getRoads() {
        return $this->mapApiResponse(CarRoad::all($this->locale));
    }

    protected function getSeats() {
        return $this->mapApiResponse(CarSeat::all());
    }
}
