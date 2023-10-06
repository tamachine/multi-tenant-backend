<?php

namespace App\Services\Payment\Valitor;

use App\Models\Booking;

class Valitor {

    /**
     * Get the valitor params to be sent in the form used to redirect to the valitor payment website
     */
    public function getParams(
        Booking $booking, 
        string $paymentSuccessfulURL, 
        string $paymentSuccessfulServerSideURL,
        string $paymentCancelledURL    ) 
    {
        $params = new ValitorParams($booking, $paymentSuccessfulURL, $paymentSuccessfulServerSideURL, $paymentCancelledURL);
        return $params->getParams();        
    }

    /**
     * Get the url of the valitor payment website used in the form
     */
    public function getFormAction() {
        return config('valitor.url');
    }


    /**
     * Checks the valitor response
     */
    public function checkResponse() {
        $response = new ValitorCheckResponse();

        return $response->check();
    }
}