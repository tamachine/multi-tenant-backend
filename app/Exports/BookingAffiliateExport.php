<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookingAffiliateExport implements FromView
{
    /**
     * @var object
     */
    protected $bookings;

    /**
     * @var int
     */
    public $affiliate_id;

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
    public $vehicle = "";

    /**
     * @var string
     */
    public $vendor = "";

    /**
     * @var string
     */
    public $order_number = "";

    /**
     * @var string
     */
    public $email = "";

    /**
     * @var string
     */
    public $first_name = "";

    /**
     * @var string
     */
    public $last_name = "";

    /**
     * @var string
     */
    public $telephone = "";

    /**
     * @var string
     */
    public $date_format = "d-m-Y H:i";

    /**
     * @param      string  $affiliate_id        int
     * @param      string  $booking_start_date  string
     * @param      string  $booking_end_date    string
     * @param      string  $pickup_start_date   string
     * @param      string  $pickup_end_date     string
     * @param      string  $dropoff_start_date  string
     * @param      string  $dropoff_end_date    string
     * @param      string  $payment_status      string
     * @param      string  $vendor_status       string
     * @param      string  $booking_status      string
     * @param      string  $vehicle             string
     * @param      string  $vendor              string
     * @param      string  $order_number        string
     * @param      string  $email               string
     * @param      string  $first_name          string
     * @param      string  $last_name           string
     * @param      string  $telephone           string
     * @param      string  $order_column        string
     * @param      string  $order_way           string
     * @param      string  $date_format         string
     */
    public function __construct(
        $affiliate_id,
        $booking_start_date,
        $booking_end_date,
        $pickup_start_date,
        $pickup_end_date,
        $dropoff_start_date,
        $dropoff_end_date,
        $payment_status,
        $vendor_status,
        $booking_status,
        $vehicle,
        $vendor,
        $order_number,
        $email,
        $first_name,
        $last_name,
        $telephone,
        $order_column,
        $order_way,
        $date_format
    ) {
        $this->affiliate_id = $affiliate_id;
        $this->booking_start_date = $booking_start_date;
        $this->booking_end_date = $booking_end_date;
        $this->pickup_start_date = $pickup_start_date;
        $this->pickup_end_date = $pickup_end_date;
        $this->dropoff_start_date = $dropoff_start_date;
        $this->dropoff_end_date = $dropoff_end_date;
        $this->payment_status = $payment_status;
        $this->vendor_status = $vendor_status;
        $this->booking_status = $booking_status;
        $this->vehicle = $vehicle;
        $this->vendor = $vendor;
        $this->order_number = $order_number;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->telephone = $telephone;
        $this->order_column = $order_column;
        $this->order_way = $order_way;
        $this->date_format = $date_format;

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
            $this->vehicle,
            $this->vendor,
            $this->order_number,
            $this->email,
            $this->first_name,
            $this->last_name,
            $this->telephone
        )
            ->where('affiliate_id', $this->affiliate_id)
            ->orderBy($this->order_column, $this->order_way)
            ->get();
    }

    public function view(): View
    {
        return view('exports.booking.affiliate', ['bookings' => $this->bookings, 'date_format' => $this->date_format]);
    }
}
