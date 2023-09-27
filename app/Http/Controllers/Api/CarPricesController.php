<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Car;
use App\Models\CarEngine;
use Illuminate\Http\JsonResponse;
use App\Models\CarType;
use App\Models\CarTransmission;
use App\Models\CarRoad;
use App\Models\CarSeat;
use App\Services\CarPrices\CarPrices;
use Illuminate\Http\Request;

class CarPricesController extends BaseController
{

     /**
     * @lrd:start
     * ## Returns all filters for cars search
     * @lrd:end   
     * 
     * ## car_hashid: car hashid
     * 
     * @QAparam dates[from|to] array nullable dates[from]=Y-m-d H:i:s&dates[to]=Y-m-d H:i:s 
     * @QAparam locations[pickup|dropoff] array nullable locations[pickup]=locationhashid&locations[dropoff]=locationhashid 
     * @QAparam insurance array nullable insurance hashid
     * @QAparam extras array nullable extras[extra_hashid]=extra_quantity&extras[extra_hashid]=quantity
     * @QAparam currency string nullable default 'ISK'
     * @QAparam locale string nullable   
     */
    public function index(
            Car $car,             
            Request $request,
            CarPrices $carPrices
        ):JsonResponse {

        $this->checkLocale($request);        

        $prices = $carPrices->getPrices($car, $request->all());

        if($prices) {            
            return $this->successResponse($prices->toApiResponse());    
        } else {
            $this->badRequestError();
            
            return $this->errorResponse($carPrices->errors());
        }        
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
            case 'engines':
                $filters = $this->getEngines(); 
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

    protected function getEngines() {
        return $this->mapApiResponse(CarEngine::all($this->locale));
    }
}
