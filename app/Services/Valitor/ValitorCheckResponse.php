<?php

namespace App\Services\Valitor;

use App\Models\Booking;
use Illuminate\Http\Request;

/**
 * This class checks the response of valitor when a payment is made
  */
class ValitorCheckResponse {

    protected Booking $booking;
    protected Request $request;

    public function __construct(Request $request) 
    {
        $this->request = $request;
        
        $this->setBooking();
    }

    
    public function check() : bool 
    {
        return true;
    }

    protected function setBooking()
    {

    }

    protected function checkDigitalSignatureResponse() 
    {

    }
}

?>