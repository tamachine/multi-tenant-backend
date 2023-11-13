<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Booking;
use App\Services\Payment\PaymentResolver;
use Illuminate\Http\Request;
use Valitor;

class ValitorController extends BaseController
{
    /**
     * Returns valitor params
     * * ## booking: hashid of the booking
     * @QAparam url_ok string required "url where valitor must redirect after successful payment"
     * @QAparam url_ko string required "url where valitor must redirect after cancelled payment"
     */    
    public function requestParams(Booking $booking, Request $request, PaymentResolver $paymentResolver) {

        $paymentClasses = $paymentResolver->getPaymentClasses();

        if(!in_array(Valitor::class, $paymentClasses)) {
            $this->badRequestError();

            return $this->errorResponse('valitor is not a valid payment method');
        }

        if(!$request->has('url_ok') || !$request->has('url_ko')) {
            $this->missingParameterError();
            
            return $this->errorResponse('url_ok and urlko are required');
        }

        if (!filter_var($request->input('url_ok'), FILTER_VALIDATE_URL)) { 
            $this->badRequestError();

            return $this->errorResponse('url_ok must be a valid url');
        }

        if (!filter_var($request->input('url_ko'), FILTER_VALIDATE_URL)) { 
            $this->badRequestError();

            return $this->errorResponse('url_ko must be a valid url');
        }

        return $this->successResponse([
            'params'      => Valitor::getParams($booking, $request->input('url_ok'), $request->input('url_ok'), $request->input('url_ko')),
            'form_action' => Valitor::getFormAction()
        ]);

    }

    /**
    * Checks the valitor response 
    * * ## booking: hashid of the booking
    * @QAparam valitor_response array required "params from valitor response"
    */
    public function checkResponse(Booking $booking, Request $request) {

        if(!$request->has('valitor_response')) {

            if(!is_array($request->input('valitor_response'))) {
                $this->missingParameterError();

                $this->errorResponse('valitor_response is required and must be of type array');
            }
            
        }

        $valitor_request = $request->input('valitor_response');
        
        return $this->successResponse(Valitor::checkResponse($valitor_request, $booking));
        
    }
}
