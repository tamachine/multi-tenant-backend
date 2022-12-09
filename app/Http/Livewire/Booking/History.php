<?php

namespace App\Http\Livewire\Booking;

use App\Exports\BookingHistoryExport;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Vendor;
use Excel;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use WithPagination;

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
     * @var int
     */
    public $records = 10;

    /**
     * @var string
     */
    public $date_format = "d-m-Y H:i";

    /**
     * @var string
     */
    public $order_column = "created_at";

    /**
     * @var string
     */
    public $order_way = "desc";

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

    public function mount(Car $car, Vendor $vendor)
    {
        $this->vehicles = $car->orderBy('name')->pluck('name', 'hashid');
        $this->vendors = $vendor->orderBy('name')->pluck('name', 'hashid');

        $this->fill(request()->only('page'));
    }

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
        $this->order_number = "";
        $this->email = "";
        $this->first_name = "";
        $this->last_name = "";
        $this->telephone = "";
    }

    public function changeOrder($column)
    {
        if ($this->order_column != $column) {
            $this->order_column = $column;
            $this->order_way = "desc";
        } else {
            $this->order_way = $this->order_way == "desc" ? "asc" : "desc";
        }
    }

    public function excelExport()
    {
        return Excel::download(new BookingHistoryExport(
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
            $this->telephone,
            $this->order_column,
            $this->order_way,
            $this->date_format
        ), 'Booking History.xlsx');
    }

    public function render()
    {
        $bookings = Booking::historySearch(
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
            ->orderBy($this->order_column, $this->order_way)
            ->paginate($this->records);

        return view('livewire.booking.history', ['bookings' => $bookings]);
    }
}
