<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CustomerExport implements FromView
{
    /**
     * @var object
     */
    protected $bookings;

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

    /**
     * @var string
     */
    public $vendor = "";

    /**
     * @param      string  $booking_start_date
     * @param      string  $booking_end_date
     * @param      string  $pickup_start_date
     * @param      string  $pickup_end_date
     * @param      string  $dropoff_start_date
     * @param      string  $dropoff_end_date
     * @param      string  $payment_status
     * @param      string  $vendor_status
     * @param      string  $booking_status
     * @param      string  $vendor
     */
    public function __construct(
        $booking_start_date,
        $booking_end_date,
        $pickup_start_date,
        $pickup_end_date,
        $dropoff_start_date,
        $dropoff_end_date,
        $payment_status,
        $vendor_status,
        $booking_status,
        $vendor
    ) {
        $this->booking_start_date = $booking_start_date;
        $this->booking_end_date = $booking_end_date;
        $this->pickup_start_date = $pickup_start_date;
        $this->pickup_end_date = $pickup_end_date;
        $this->dropoff_start_date = $dropoff_start_date;
        $this->dropoff_end_date = $dropoff_end_date;
        $this->payment_status = $payment_status;
        $this->vendor_status = $vendor_status;
        $this->booking_status = $booking_status;
        $this->vendor = $vendor;

        $this->bookings = Booking::historySearch(
            $this->booking_start_date,
            $this->booking_end_date,
            $this->pickup_start_date,
            $this->pickup_end_date,
            $this->dropoff_start_date,
            $this->dropoff_end_date,
            $this->payment_status,
            $this->vendor_status,
            $this->booking_status,
            null,
            $this->vendor,
            null,
            null,
            null,
            null,
            null,
        )
            ->select('email', 'first_name', 'last_name')
            ->orderBy('email', 'asc')
            ->get();
    }

    public function view(): View
    {
        return view('exports.booking.mailing', ['bookings' => $this->bookings]);
    }
}
