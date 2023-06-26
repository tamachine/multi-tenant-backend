<?php

namespace App\Http\Livewire\Web;

use App\Apis\Caren\Api;
use App\Models\Affiliate;
use App\Models\Booking;
use App\Models\Car;
use App\Traits\Livewire\SummaryTrait;
use App\Jobs\CreateCarenBooking;
use Livewire\Component;

class Payment extends Component
{
    use SummaryTrait;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

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
    public $email = "";

    /**
     * @var string
     */
    public $email_confirmation = "";

    /**
     * @var string
     */
    public $telephone = "";

    /**
     * @var string
     */
    public $address = "";

    /**
     * @var string
     */
    public $postal_code = "";

    /**
     * @var string
     */
    public $city = "";

    /**
     * @var string
     */
    public $country = "";

    /**
     * @var string
     */
    public $additional = "";

    /**
     * @var bool
     */
    public $agree = false;

    /**
     * @var int
     */
    public $number_passengers = 0;    

    /**
     * @var App/Booking|null
     */
    public $booking = null;

    protected $listeners = ['update_number' => 'updateNumberPassengers'];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        $sessionData = request()->session()->get('booking_data');

        $this->car = Car::find(dehash($sessionData['car']));

        if($this->car->featured_image) {
            $this->mainImage = $this->car->featured_image_url;
        } else {
            $this->mainImage = asset('images/cars/default-car.jpg');
        }

        $this->pickupLocation = bookingPickupLocation();
        $this->dropoffLocation = bookingDropoffLocation();
        $this->insurances = bookingInsurances();
        $this->includedExtras = $this->car->extraList()->where('included', 1);
        $this->chosenExtras = $sessionData["extras"];

        $this->percentage = $this->car->booking_percentage;
        $this->calculateTotal();
    }

    public function render()
    {
        return view('livewire.web.payment');
    }

    public function updateNumberPassengers($number)
    {
        $this->number_passengers = $number;
    }

    public function continue()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'email'         => ['required', 'email', 'confirmed'],
            'telephone'     => ['required'],
            'address'       => ['required'],
            'postal_code'   => ['required'],
            'city'          => ['required'],
            'country'       => ['required'],
            'number_passengers' => 'required|numeric|min:1|max:12'
        ];

        $this->validate($rules);

        $this->booking = $this->saveBooking();

        $this->generateValitorForm = true;
    }

    private function saveBooking()
    {
        $sessionData = request()->session()->get('booking_data');

        // Check if we have an affiliate in session
        $affiliate = null;

        if (request()->session()->has('affiliate')) {
            $affiliate = Affiliate::find(dehash(request()->session()->get('affiliate')));
        }

        // 1. Create the booking
        $booking = Booking::create([
            'car_id' => $this->car->id,
            'car_name' => $this->car->name,
            'vendor_id' => $this->car->vendor->id,
            'vendor_name' => $this->car->vendor->name,
            'pickup_location' => dehash($sessionData['pickup']),
            'pickup_at' => $sessionData['from'],
            'pickup_name' => $this->pickupLocation,
            'dropoff_location' => dehash($sessionData['dropoff']),
            'dropoff_at' => $sessionData['to'],
            'dropoff_name' => $this->dropoffLocation,

            'rental_price' => $this->rentalPrice,
            'extras_price' => $this->extrasPrice,
            'total_price' => $this->totalPrice,
            'online_payment' => $this->payNow,

            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'country' => $this->country,
            'number_passengers' => $this->number_passengers,

            'affiliate_id' => $affiliate ? $affiliate->id : null,
            'affiliate_commission' => $affiliate
                ? round($this->payNow * $affiliate->commission_percentage / 100)
                : null,
        ]);

        $sessionData['booking'] = $booking->hashid;
        request()->session()->put('booking_data', $sessionData);

        // 2. Add the insurances
        foreach($sessionData["insurances"] as $insurance) {
            $booking->bookingExtras()->create([
                'extra_id'  => dehash($insurance["id"]),
                'units'     => 1,
            ]);
        }

        // 3. Add the extras
        foreach($sessionData["extras"] as $key => $extra) {
            $booking->bookingExtras()->create([
                'extra_id'  => dehash($key),
                'units'     => 1,
            ]);
        }

        // 4. Save a booking log
        $booking->logs()->create([
            'message'    => 'Booking created'
        ]);             

        // 5. Create booking in caren
        dispatch(new CreateCarenBooking($booking));  

        return $booking;
    }    
}
