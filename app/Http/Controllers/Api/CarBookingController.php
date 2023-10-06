<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\Car;
use App\Services\Car\CarBooking\CarBooking;

class CarBookingController extends BaseController
{
    /**     
     * @lrd:start
     * ## create a booking.
     * ## car: hashid of the car
     * 
     * @QAparam dates array required {"to": "Y-m-d H:i:s","from": "Y-m-d H:i:s"}              
     * @QAparam locations array required {"pickup": "locationhashid","dropoff": "locationhashid"}     
     * @QAparam insurances array required ["hashid","hashid", ...]      
     * @QAparam extras array required {"extra_hashid": "quantity", "extra_hashid": "quantity", ... ]           
     * 
     * @QAparam details array required { "first_name":"string", "last_name" : "string", "email":"email", "telephone" : "string", "address": "string", "postal_code":"string", "city" : "string", "country":"string", "number_passengers" : "integer" }
     
     * @QAparam currency string nullable default "ISK"
     * @QAparam affiliate string nullable affiliate hashid 
     *       
     * @lrd:end     
     */  
    public function create(Car $car, Request $request, CarBooking $carBooking):JsonResponse {
       
        $booking = $carBooking->create($car, $request->all());

        if($booking) {            
            return $this->successResponse($booking->toApiResponse());    
        } else {
            $this->badRequestError();
            
            return $this->errorResponse($carBooking->errors());
        } 
               
    }    
}
