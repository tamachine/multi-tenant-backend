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

    use ValitorBase;

    public function __construct() 
    {
        $this->request = request();

        $this->setValitorConfig();
        
        $this->setBooking();        
    }
    
    public function check() : bool 
    {
        return $this->checkDigitalSignatureResponse();
    }

    protected function setBooking()
    {
        $this->booking = Booking::ValitorReferenceNumber($this->request->ReferenceNumber)->first();
    }

    protected function checkDigitalSignatureResponse() 
    {
        if($this->booking) {
            return ($this->request->DigitalSignatureResponse == hash('sha256', ($this->valitorConfig['verification_code'] . $this->booking->valitor_reference_number)));
        }
        
        return false;
    }
}

?>