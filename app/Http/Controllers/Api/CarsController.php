<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\CarsSearch\CarsSearch;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class CarsController extends BaseController
{

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
        $data['cars'] = $this->mapCarApiResponse($carsSearch->getCars());
        
        return $this->successResponse($data);
    }

    protected function mapCarApiResponse($cars) {        
        $newCars = collect($this->mapApiResponse($cars));
        
        $newParams = ['daily_price','total_price'];

        $newCars = $newCars->map(function ($car, $key) use ($cars, $newParams) {
            $originalCar = $cars->where('hashid', $car['hashid'])->first(); 

            foreach($newParams as $newParam) {
                $car[$newParam] = $originalCar->$newParam;    
            }            
            
            return $car;
        });

        return $newCars;

    }

}
