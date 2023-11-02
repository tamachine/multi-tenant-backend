<?php

namespace App\Traits\Livewire;

use App\Traits\Livewire\OrderTableTrait;

trait BookingHistoryTrait
{
    use OrderTableTrait;

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
     * @var array
     */
    public $vehicles = [];

    /**
     * @var string
     */
    public $vehicle = "";

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
    public $order_id = "";

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
    public $additional_info = "";

    /**
     * @var int
     */
    public $records = 10;

    /**
     * @var string
     */
    public $date_format = "d-m-Y H:i";

    /**
     * @var array
     */
    protected $updatesQueryString = [
        'page' => ['except' => 1],
    ];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function resetFilters()
    {
        $this->booking_start_date = "";
        $this->booking_end_date = "";
        $this->pickup_start_date = "";
        $this->pickup_end_date = "";
        $this->dropoff_start_date = "";
        $this->dropoff_end_date = "";
        $this->payment_status = "";
        $this->vendor_status = "";
        $this->booking_status = "";
        $this->vehicle = "";
        $this->vendor = "";
        $this->order_id = "";
        $this->email = "";
        $this->first_name = "";
        $this->last_name = "";
        $this->telephone = "";
    }
}
