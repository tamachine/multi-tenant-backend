<?php

namespace App\Http\Livewire\Admin\Statistics;

use App\Models\Booking;
use App\Models\Vendor;
use Livewire\Component;

class Index extends Component
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
    public $date = "";

    /**
     * @var array
     */
    public $vendors = [];

    /**
     * @var array
     */
    public $colors = [];

    /**
     * @var string
     */
    public $vendor = "";

    /**
     * @var object
     */
    public $locationBookings;

    /**
     * @var object
     */
    public $bookingsPerMonth;

    /**
     * @var object
     */
    public $vendorBookings;

    /**
     * @var object
     */
    public $carBookings;

    /**
     * @var object
     */
    public $extras;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Vendor $vendor)
    {
        $this->vendors = $vendor->orderBy('name')->pluck('name', 'hashid');
        $this->colours = $vendor->orderBy('name')->pluck('brand_color', 'id');
    }

    public function filterStatistics()
    {
        // If date filter has a value, ignore the booking date filter
        if (!empty($this->date)) {
            $this->booking_start_date = "";
            $this->booking_end_date = "";
        }

        $this->locationBookings();
        $this->bookingsPerMonth();
        $this->vendorBookings();
        $this->carBookings();
        $this->extras();
    }

    private function locationBookings()
    {
        $this->locationBookings = Booking::statisticsSearch(
            $this->booking_start_date,
            $this->booking_end_date,
            $this->date,
            $this->vendor
        )
            ->selectRaw('
                pickup_name,
                count(*) as number,
                AVG(total_price) as average_price,
                AVG(datediff(dropoff_at, pickup_at)) as average_days
            ')
            ->whereIn('status', ['confirmed', 'concluded'])
            ->groupBy('pickup_name')
            ->orderBy('number', 'desc')
            ->get();
    }

    private function bookingsPerMonth()
    {
        $this->bookingsPerMonth = [];

        $bookingsPerMonth = Booking::statisticsSearch(
            $this->booking_start_date,
            $this->booking_end_date,
            $this->date,
            $this->vendor
        )
            ->whereIn('status', ['confirmed', 'concluded']);

        $queryFrom = clone $bookingsPerMonth;
        $queryTo = clone $bookingsPerMonth;

        // Check that there is at least one booking
        if (!$queryFrom->orderBy('created_at', 'asc')->first()) {
            return;
        }

        $dateFrom = $queryFrom->orderBy('created_at', 'asc')->first()->created_at->startOfMonth();
        $dateTo = $queryTo->orderBy('created_at', 'desc')->first()->created_at->endofMonth();

        while($dateFrom < $dateTo) {
            $queryMonth = clone $bookingsPerMonth;
            $endMonth = clone $dateFrom;
            $endMonth = $endMonth->endofMonth();
            $this->bookingsPerMonth[$dateFrom->format('M - Y')] =
                $queryMonth->whereBetween('created_at', [$dateFrom->startOfMonth(), $endMonth])->count();
            $dateFrom->addMonth();
        }
    }

    private function vendorBookings()
    {
        $this->vendorBookings = Booking::statisticsSearch(
            $this->booking_start_date,
            $this->booking_end_date,
            $this->date,
            $this->vendor
        )
            ->selectRaw('
                vendor_id,
                vendor_name,
                count(*) as number,
                AVG(total_price) as average_price,
                AVG(online_payment) as average_commission,
                SUM(online_payment) as total_commission,
                AVG(datediff(dropoff_at, pickup_at)) as average_days
            ')
            ->whereIn('status', ['confirmed', 'concluded'])
            ->groupBy('vendor_id', 'vendor_name')
            ->orderBy('number', 'desc')
            ->get();
    }

    private function carBookings()
    {
        $this->carBookings = Booking::statisticsSearch(
            $this->booking_start_date,
            $this->booking_end_date,
            $this->date,
            $this->vendor
        )
            ->selectRaw('
                car_name,
                vendor_id,
                vendor_name,
                count(*) as number,
                AVG(total_price) as average_price,
                AVG(online_payment) as average_commission,
                SUM(online_payment) as total_commission,
                AVG(datediff(dropoff_at, pickup_at)) as average_days
            ')
            ->whereIn('status', ['confirmed', 'concluded'])
            ->groupBy('car_name', 'vendor_id', 'vendor_name')
            ->orderBy('number', 'desc')
            ->get();
    }

    private function extras()
    {
        $this->extras = Booking::statisticsSearch(
            $this->booking_start_date,
            $this->booking_end_date,
            $this->date,
            $this->vendor
        )
            ->join('booking_extra', 'booking_extra.booking_id', '=', 'bookings.id')
            ->join('extras', 'booking_extra.extra_id', '=', 'extras.id')
            ->selectRaw('
                extras.name,
                bookings.vendor_id,
                bookings.vendor_name,
                count(bookings.id) as number,
                extras.category
            ')
            ->whereIn('bookings.status', ['confirmed', 'concluded'])
            ->groupBy('extras.id', 'vendor_id', 'vendor_name')
            ->orderBy('number', 'desc')
            ->get();
    }

    private function chartEncode()
    {
        $chart = "";

        foreach($this->bookingsPerMonth as $key => $count) {
            $chart .= "['$key', $count],";
        }

        return $chart;
    }

    public function render()
    {
        $this->filterStatistics();

        $this->dispatchBrowserEvent('reloadChart', $this->bookingsPerMonth);

        return view('livewire.admin.statistics.index');
    }
}
