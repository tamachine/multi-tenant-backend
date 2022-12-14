<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Location;
use App\Models\Vendor;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $vendor = "";

    /**
     * @var array
     */
    public $vendors = [];

    /**
     * @var string
     */
    public $car = "";

     /**
     * @var array
     */
    public $cars = [];

    /**
     * @var string
     */
    public $pickup_location = "";

    /**
     * @var string
     */
    public $pickup_date;

    /**
     * @var string
     */
    public $pickup_hour = "12:00";

    /**
     * @var string
     */
    public $dropoff_location = "";

    /**
     * @var string
     */
    public $dropoff_date;

    /**
     * @var string
     */
    public $dropoff_hour = "12:00";

    /**
     * @var array
     */
    public $locations = [];

    /**
     * @var array
     */
    public $hours = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        $this->vendors = Vendor::pluck('name', 'hashid');

        $this->hours = hours_dropdown();
        $this->pickup_date = now()->format('d-m-Y');
        $this->dropoff_date = now()->format('d-m-Y');
    }

    public function updatedVendor($value)
    {
        $vendor = Vendor::find(dehash($this->vendor));

        if (!emptyOrNull($value)) {
            $this->cars = $vendor->cars()->orderBy('name', 'asc')->pluck('name', 'hashid');
            $this->locations = $vendor->locations()->orderBy('name', 'asc')->pluck('name', 'hashid');
        }
    }

    public function saveBooking(Booking $booking)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'vendor' => ['required'],
            'car' => ['required'],
            'pickup_location' => ['required'],
            'dropoff_location' => ['required'],
            'pickup_date' => ['required', 'date'],
            'dropoff_date' => ['required', 'date', 'after:pickup_date'],
        ];

        $this->validate($rules);

        $car = Car::find(dehash($this->car));
        $vendor = Vendor::find(dehash($this->vendor));
        $pickup = Location::find(dehash($this->pickup_location));
        $dropoff = Location::find(dehash($this->dropoff_location));

        $booking = $booking->create([
            'car_id' => $car->id,
            'car_name' => $car->name,
            'vendor_id' => $vendor->id,
            'vendor_name' => $vendor->name,
            'pickup_location' => $pickup->id,
            'pickup_at' => Carbon::createFromFormat("d-m-Y H:i", $this->pickup_date . " " . $this->pickup_hour),
            'pickup_name' => $pickup->name,
            'dropoff_location' => $dropoff->id,
            'dropoff_at' => Carbon::createFromFormat("d-m-Y H:i", $this->dropoff_date . " " . $this->dropoff_hour),
            'dropoff_name' => $dropoff->name,
        ]);

        // Save a booking log
        $booking->logs()->create([
            'user_id'    => auth()->user()->id,
            'message'    => 'Booking created'
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Booking created. Please edit the booking data');

        return redirect()->route('booking.edit', $booking->hashid);
    }

    public function render()
    {
        return view('livewire.booking.create');
    }
}
