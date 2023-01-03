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
    private $totalBookings;

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
    public $carBookingsChart;

    /**
     * @var object
     */
    public $customersChart;

    /**
     * @var object
     */
    public $extras;

    /**
     * @var object
     */
    public $extrasChart;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Vendor $vendor)
    {
        $this->vendors = $vendor->orderBy('name')->pluck('name', 'hashid');
        $this->colors = $vendor->orderBy('name')->pluck('brand_color', 'id');
    }

    public function filterStatistics()
    {
        // If date filter has a value, ignore the booking date filter
        if (!empty($this->date)) {
            $this->booking_start_date = "";
            $this->booking_end_date = "";
        }

        $this->initiliaze();
        $this->getTotalBookings();
        if ($this->totalBookings->count() > 0) {
            $this->locationBookings();
            $this->bookingsPerMonth();
            $this->vendorBookings();
            $this->carBookings();
            $this->customers();
            $this->extras();
        }
    }

    private function initiliaze()
    {
        $this->locationBookings = [];
        $this->bookingsPerMonth = [];
        $this->vendorBookings = [];
        $this->carBookings = [];
        $this->carBookingsChart = [];
        $this->customersChart = [];
        $this->extras = [];
        $this->extrasChart = [];
    }

    private function getTotalBookings()
    {
        $this->totalBookings = Booking::statisticsSearch(
            $this->booking_start_date,
            $this->booking_end_date,
            $this->date,
            $this->vendor
        )
            ->whereIn('status', ['confirmed', 'concluded']);
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
        $queryFrom = clone $this->totalBookings;
        $queryTo = clone $this->totalBookings;

        $dateFrom = $queryFrom->orderBy('created_at', 'asc')->first()->created_at->startOfMonth();
        $dateTo = $queryTo->orderBy('created_at', 'desc')->first()->created_at->endofMonth();

        while($dateFrom < $dateTo) {
            $queryMonth = clone $this->totalBookings;
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

        // Get the data for the car chart: The 10 most booked cars
        $totalBookings = $this->carBookings->sum('number');
        $topTen = $this->carBookings->take(10);

        foreach ($topTen as $carBooking) {
            $this->carBookingsChart[$carBooking->car_name] = round(($carBooking->number / $totalBookings) * 100, 2);
        }

        if (count($this->carBookings) > 10) {
            $otherNumber = $totalBookings - $topTen->sum('number');
            $this->carBookingsChart['Others'] = round(($otherNumber / $totalBookings) * 100, 2);
        }
    }

    private function customers()
    {
        $queryCustomers = clone $this->totalBookings;
        $topCustomers = $queryCustomers->selectRaw('country, count(bookings.id) as number')->groupBy('country')->orderBy('number', 'desc')->take(16)->get();

        foreach ($topCustomers as $topCustomer) {
            $this->customersChart[$topCustomer->country] = $topCustomer->number;
        }
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

        // Data for the extra charts
        $queryWith = clone $this->totalBookings;
        $queryWithout = clone $this->totalBookings;

        $this->extrasChart['Extra/insurance booked'] = round(($queryWith->whereHas('bookingExtras')->count() / $this->totalBookings->count()) * 100, 2);
        $this->extrasChart['No Extra booked'] = round(($queryWithout->whereDoesntHave('bookingExtras')->count() / $this->totalBookings->count()) * 100, 2);
    }

    public function render()
    {
        $this->filterStatistics();

        $this->dispatchBrowserEvent('reloadBookingsChart', $this->bookingsPerMonth);
        $this->dispatchBrowserEvent('reloadCarsChart', $this->carBookingsChart);
        $this->dispatchBrowserEvent('reloadCustomersChart', $this->customersChart);
        $this->dispatchBrowserEvent('reloadExtrasChart', $this->extrasChart);

        return view('livewire.admin.statistics.index');
    }
}
