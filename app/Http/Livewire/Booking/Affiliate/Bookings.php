<?php

namespace App\Http\Livewire\Booking\Affiliate;

use App\Exports\BookingAffiliateExport;
use App\Models\Affiliate;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Vendor;
use App\Traits\Livewire\BookingHistoryTrait;
use Excel;
use Livewire\Component;
use Livewire\WithPagination;

class Bookings extends Component
{
    use BookingHistoryTrait, WithPagination;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

   /**
     * @var App\Models\Affiliate
     */
    public $affiliate;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Affiliate $affiliate)
    {
        $this->affiliate = $affiliate;
        $this->vehicles = Car::orderBy('name')->pluck('name', 'hashid');
        $this->vendors = Vendor::orderBy('name')->pluck('name', 'hashid');

        $this->fill(request()->only('page'));
    }

    public function excelExport()
    {
        return Excel::download(new BookingAffiliateExport(
            $this->affiliate->id,
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
            $this->order_id,
            $this->email,
            $this->first_name,
            $this->last_name,
            $this->telephone,
            $this->order_column,
            $this->order_way,
            $this->date_format
        ), 'Bookings - ' . $this->affiliate->name .'.xlsx');
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
            $this->order_id,
            $this->email,
            $this->first_name,
            $this->last_name,
            $this->telephone
        )
            ->where('affiliate_id', $this->affiliate->id)
            ->orderBy($this->order_column, $this->order_way)
            ->paginate($this->records);

        return view('livewire.booking.affiliate.bookings', ['bookings' => $bookings]);
    }
}
