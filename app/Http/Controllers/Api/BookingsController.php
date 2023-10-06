<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Jobs\CreateBookingPdf;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;

class BookingsController extends BaseController {

    protected $booking;

     /**     
     * @lrd:start
     * ## Updates a booking 
     * ## api_booking_hashid: hashid of the booking
     * @QAparam valitor_request array nullable "the valitor request for the booking"     
     * @QAparam valitor_response array nullable "the valitor response for the booking"     
     * @lrd:end     
     */
    public function update(Booking $booking) {

        $this->booking = $booking;

        $this->updateBooking('valitor_request');
        $this->updateBooking('valitor_response');
        $this->updateBooking('payment_status');        
        
        $booking->refresh();

        return $this->successResponse($booking->toApiResponse());
    }    

     /**
     * @lrd:start
     * ## Returns one booking
     * ## api_booking_hashid: hashid of the booking
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function show(Booking $booking):JsonResponse {        
        
        $this->checkLocale(request());        
       
        return $this->successResponse($booking->toApiResponse($this->locale));        
    }  

    /**
     * @lrd:start
     * ## Create the booking pdf
     * ## api_booking_hashid: hashid of the booking
     * @QAparam send boolean false "true for sending the pdf to the client" 
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function pdf(Booking $booking):JsonResponse {    
        
        $send = false;

        if(request()->has('send')) {
            $send = $this->castBool($send);
        }

        dispatch(new CreateBookingPdf($booking, $send)); 

        return $this->successResponse(true);
    }

    protected function updateBooking($attribute) {
        if(request()->has($attribute)) {
            $attribute_value = request()->input($attribute);

            if(is_array($attribute_value)) {
                $this->booking->$attribute = $attribute_value;
                $this->booking->save();
            } 
        }
    }   
}