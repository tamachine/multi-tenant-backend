<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController extends BaseController {

     /**     
     * @lrd:start
     * ## Updates a booking 
     * ## api_booking_hashid: hashid of the booking
     * @QAparam valitor_request array nullable "the valitor request for the booking"     
     * @lrd:end     
     */
    public function update(Booking $booking, Request $request) {
        
        if($request->has('valitor_request')) {
            $valitor_request = $request->input('valitor_request');

            if(is_array($valitor_request)) $booking->valitor_request = $request->input('valitor_request');
        }

        return $this->successResponse($booking->toApiResponse());
    }

}