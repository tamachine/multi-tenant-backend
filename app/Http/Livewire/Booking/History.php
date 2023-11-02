<?php

namespace App\Http\Livewire\Booking;

use App\Exports\BookingHistoryExport;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Vendor;
use App\Traits\Livewire\BookingHistoryTrait;
use Excel;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use BookingHistoryTrait, WithPagination;

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
            $this->order_id,
            $this->email,
            $this->first_name,
            $this->last_name,
            $this->telephone,
            $this->order_column,
            $this->order_way,
            $this->date_format,
            $this->additional_info
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
            $this->order_id,
            $this->email,
            $this->first_name,
            $this->last_name,
            $this->telephone,
            $this->additional_info
        )
            ->with('affiliate')
            ->orderBy($this->order_column, $this->order_way)
            ->paginate($this->records);

        return view('livewire.booking.history', ['bookings' => $bookings]);
    }
}
