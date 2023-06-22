<?php

namespace App\Http\Controllers\Web;

use Valitor;
use App\Jobs\CreateBookingPdf;
use App\Models\Booking;

//http://nave-intergalactica.test/success?AuthorizationNumber=323575&CardNumberMasked=999999%2A%2A%2A%2A%2A%2A9999&CardType=%C3%93%C3%9EEKKT%20KORTATEGUND%3A%20RUPAY&CardTypeCode=&ContractNumber=800573&ContractType=ORUGGS&Date=22.06.2023&DigitalSignatureResponse=00470dba4076af958bb3628e0c905f38f5369c3039f95f8a4896a79684945210&ReferenceNumber=JQ1J4OF45O&SaleID=f815b100-129b-4ce9-bea6-bfa798b84c97&TransactionNumber=317310667401git pu
class SuccessController extends BaseController
{
    protected $booking;    

    public function index()
    {
        
        if (!checkSessionPayment()) {
            return redirect()->route('cars');
        }

        $this->setBooking();

        $this->setValitorResponseToBooking();

        if(!Valitor::checkResponse()) {
            return view('web.success.error');
        }

        $this->confirmBooking();

        //create and send the pdf to the client
        dispatch(new CreateBookingPdf($this->booking, true));        

        return view('web.success.index');
    }

    protected function setBooking() {
        $bookingHashid = request()->session()->get('booking_data')['booking'];

        $this->booking = Booking::FindByHashid($bookingHashid);
    }

    protected function confirmBooking() {
       
        $this->booking->payment_status = 'confirmed';
        $this->booking->save();                
    }

    protected function setValitorResponseToBooking() {
       
        $this->booking->valitor_response = json_encode(request()->all());
        $this->booking->save();                
    }

    protected function footerImagePath(): string
    {
        return '/images/footer/success.png';
    }    
}
