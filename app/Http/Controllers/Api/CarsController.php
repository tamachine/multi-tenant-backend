<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\CarsSearch\CarsSearch;

class CarsController extends BaseController
{

     /**
     * @lrd:start
     * ## Returns all cars filtered.
     * @lrd:end      
     * @QAparam types array nullable "types[]=4x4&types[]=large ..." multiple search
     * @QAparam specs[engine|road|transmission|seat] array nullable "specs[engine]=value&specs[road]=value..." single search
     * @QAparam dates[from|to] array nullable "dates[from]=d-m-y H:m&dates[to]=d-m-y H:m" 
     * @QAparam locations[pickup|dropoff] array nullable locations[pickup]=locationid&locations[dropoff]=locationid 
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
        $data['cars'] = $this->mapApiResponse($carsSearch->getCars());
        
        return $this->successResponse($data);
    }

    

}
