<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use Livewire\Component;

class Customer extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

     /**
     * @var App\Models\Booking
     */
    public $booking;

    /**
     * @var string
     */
    public $first_name;

    /**
     * @var string
     */
    public $last_name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $telephone;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $postal_code;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $state;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $driver_name;

    /**
     * @var string
     */
    public $driver_date_birth;

    /**
     * @var string
     */
    public $driver_id_passport;

    /**
     * @var string
     */
    public $driver_license_number;

    /**
     * @var string
     */
    public $extra_driver_info1;

    /**
     * @var string
     */
    public $extra_driver_info2;

    /**
     * @var string
     */
    public $extra_driver_info3;

    /**
     * @var string
     */
    public $extra_driver_info4;

    /**
     * @var string
     */
    public $weight_info;

    /**
     * @var int
     */
    public $number_passengers;

    /**
     * @var string
     */
    public $pickup_input_info;

    /**
     * @var string
     */
    public $dropoff_input_info;

    /**
     * @var bool
     */
    public $newsletter;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Booking $booking)
    {
        $this->booking = $booking;

        $this->first_name = $booking->first_name;
        $this->last_name = $booking->last_name;
        $this->email = $booking->email;
        $this->telephone = $booking->telephone;
        $this->address = $booking->address;
        $this->postal_code = $booking->postal_code;
        $this->city = $booking->city;
        $this->state = $booking->state;
        $this->country = $booking->country;

        $this->driver_name = $booking->driver_name;
        $this->driver_date_birth = $booking->driver_date_birth;
        $this->driver_id_passport = $booking->driver_id_passport;
        $this->driver_license_number = $booking->driver_license_number;
        $this->extra_driver_info1 = $booking->extra_driver_info1;
        $this->extra_driver_info2 = $booking->extra_driver_info2;
        $this->extra_driver_info3 = $booking->extra_driver_info3;
        $this->extra_driver_info4 = $booking->extra_driver_info4;
        $this->weight_info = $booking->weight_info;

        $this->number_passengers = $booking->number_passengers;
        $this->pickup_input_info = $booking->pickup_input_info;
        $this->dropoff_input_info = $booking->dropoff_input_info;
        $this->newsletter = $booking->newsletter;
    }

    public function saveCustomer()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
        ];

        $this->validate($rules);

        $this->booking->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,

            'driver_name' => $this->driver_name,
            'driver_date_birth' => $this->driver_date_birth,
            'driver_id_passport' => $this->driver_id_passport,
            'driver_license_number' => $this->driver_license_number,
            'extra_driver_info1' => $this->extra_driver_info1,
            'extra_driver_info2' => $this->extra_driver_info2,
            'extra_driver_info3' => $this->extra_driver_info3,
            'extra_driver_info4' => $this->extra_driver_info4,
            'weight_info' => $this->weight_info,

            'number_passengers' => $this->number_passengers,
            'pickup_input_info' => $this->pickup_input_info,
            'dropoff_input_info' => $this->dropoff_input_info,
            'newsletter' => $this->newsletter,
        ]);

        $changes = $this->booking->getChanges();

        // Save a booking log if there have been changes
        if (count($changes)) {
            $this->booking->logs()->create([
                'user_id'    => auth()->user()->id,
                'message'    => 'Customer information updated: ' . translate_log_fields($changes)
            ]);
        }

        session()->flash('status', 'success');
        session()->flash('message', 'TThe customer information has been saved');

        return redirect()->route('intranet.booking.edit', ["booking" => $this->booking->hashid, "tab" => "customer"]);
    }

    public function render()
    {
        return view('livewire.booking.customer');
    }
}
