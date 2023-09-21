<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Car;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\CarsSearch\CarsSearch;
use App\Traits\Controllers\Api\HasSeoConfigurations;

class CarsController extends BaseController
{
    use HasSEOConfigurations;

     /**
     * @lrd:start
     * ## Returns all cars filtered.
     * @lrd:end      
     * @QAparam types array nullable "types[]=4x4&types[]=large ..." multiple search
     * @QAparam specs[engine|road|transmission|seat] array nullable "specs[engine]=value&specs[road]=value..." single search
     * @QAparam dates[from|to] array nullable "dates[from]=d-m-y H:m&dates[to]=d-m-y H:m" 
     * @QAparam locations[pickup|dropoff] array nullable locations[pickup]=locationhashid&locations[dropoff]=locationhashid 
     */
    public function search(Request $request, CarsSearch $carsSearch):JsonResponse {
        
        $carsSearch->setData(
            [
                'types' => $request->has('types') ? (is_array($request->input('types')) ? $request->input('types') : []) : [],
                'specs' => $request->has('specs') ? (is_array($request->input('specs')) ? $request->input('specs') : []) : [],    
                'dates' => $request->has('dates') ? (is_array($request->input('dates')) ? $request->input('dates') : []) : [],                
                'locations' => $request->has('locations') ? (is_array($request->input('locations')) ? $request->input('locations') : []) : [],                
            ]
        );

        $data['searchByDates'] = $carsSearch->searchByDates();
        $data['cars'] = $this->mapApiResponseWithExtraParams($carsSearch->getCars(), ['daily_price','total_price']);
        
        return $this->successResponse($data);
    }

     /**
     * @lrd:start
     * ## Returns all insurances for a car
     * ## car_hashid: car hashid
     * @QAparam locale string nullable
     * @lrd:end           
     */
    public function insurances(Car $car, Request $request):JsonResponse {
        $this->checkLocale($request);  

        return $this->successResponse($this->mapApiResponseWithExtraParams($car->insuranceList(), ['price']));
    }

    /**
     * @lrd:start
     * ## Returns the seo configurations for a car
     * ## car_hashid: hashid of the car
     * ## page_name: route_name of the page
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function seoConfigurations(Car $car, Page $page):JsonResponse {
        return $this->seoConfigurationsResponse($car, $page);                
    }

}
