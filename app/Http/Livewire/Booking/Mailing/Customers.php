<?php

namespace App\Http\Livewire\Booking\Mailing;

use App\Exports\CustomerExport;
use App\Models\Vendor;
use Excel;
use Livewire\Component;

class Customers extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $booking_start_date = "";

    /**
     * @var string
     */
    public $booking_end_date = "";

    /**
     * @var string
     */
    public $pickup_start_date = "";

    /**
     * @var string
     */
    public $pickup_end_date = "";

    /**
     * @var string
     */
    public $dropoff_start_date = "";

    /**
     * @var string
     */
    public $dropoff_end_date = "";

     /**
     * @var array
     */
    public $vendors = [];

    /**
     * @var string
     */
    public $vendor = "";

    /**
     * @var string
     */
    public $payment_status = "";

    /**
     * @var string
     */
    public $vendor_status = "";

    /**
     * @var string
     */
    public $booking_status = "";

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Vendor $vendor)
    {
        $this->vendors = $vendor->orderBy('name')->pluck('name', 'hashid');
    }

    public function customerExport()
    {
        return Excel::download(new CustomerExport(
            $this->booking_start_date,
            $this->booking_end_date,
            $this->pickup_start_date,
            $this->pickup_end_date,
            $this->dropoff_start_date,
            $this->dropoff_end_date,
            $this->payment_status,
            $this->vendor_status,
            $this->booking_status,
            $this->vendor,
        ), 'Customer Excel.xlsx');
    }

    public function render()
    {
        return view('livewire.booking.mailing.customers');
    }
}
