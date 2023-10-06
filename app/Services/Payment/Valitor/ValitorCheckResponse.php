<?php

namespace App\Services\Payment\Valitor;

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
    
    /**
     * Checks the valitor response from a request
     * 
     * @return bool
     */
    public function check() : bool 
    {
        if($this->checkBooking()) {
            return $this->checkDigitalSignatureResponse();
        }
        
        return false;
    }

    /**
     * Sets the booking to the one received by valitor
     */
    protected function setBooking()
    {
        $this->booking = Booking::ValitorReferenceNumber($this->request->ReferenceNumber)->first();
    }

    /**
     * Checks that the booking received by valitor exists and it was the one sended to valitor by the client
     * 
     * @return bool
     */
    protected function checkBooking() : bool
    {
        if($this->booking) {
            return ($this->booking->hashid == $this->request->session()->get('booking_data')['booking']);
        }
        
        return false;
    }

    /**
     * Checks the DigitalSignatureResponse param ('verification code' + 'reference number') from valitor request
     * More info in the docs: https://specs.valitor.is/PaymentsPage/API/#412-paymentsuccesfulurl-and-paymentsuccesfulserversideurl
     * 
     * @return bool
     */
    protected function checkDigitalSignatureResponse() : bool
    {
        if($this->booking) {
            return ($this->request->DigitalSignatureResponse == hash('sha256', ($this->valitorConfig['verification_code'] . $this->booking->valitor_reference_number)));
        }
        
        return false;
    }
}

?>