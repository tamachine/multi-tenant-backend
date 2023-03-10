<?php

namespace App\Http\Livewire\Web;

use App\Apis\Caren\Api;
use App\Jobs\CreateBookingPdf;
use App\Models\Affiliate;
use App\Models\Booking;
use App\Models\Car;
use App\Traits\Livewire\SummaryTrait;
use Illuminate\Support\Facades\Log;
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

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        $sessionData = request()->session()->get('booking_data');

        $this->car = Car::find(dehash($sessionData['car']));

        if($this->car->mainImage()) {
            $this->mainImage = $this->car->mainImage()->assetPath();
        } elseif (count($this->car->images) > 0) {
            $this->mainImage = $this->car->images->first()->assetPath();
        } else {
            $this->mainImage = asset('images/cars/default-car.svg');
        }

        $this->pickupLocation = bookingPickupLocation();
        $this->dropoffLocation = bookingDropoffLocation();
        $this->insurances = bookingInsurances();
        $this->includedExtras = $this->car->extraList()->where('included', 1);
        $this->chosenExtras = $sessionData["extras"];

        $this->percentage = $this->car->vendor->caren_settings["online_percentage"];
        $this->calculateTotal();
    }

    public function render()
    {
        return view('livewire.web.payment');
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
        ];

        $this->validate($rules);

        $this->saveBooking();
        return redirect()->route('success');
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

        // 5. Create booking in Caren
        $this->createCarenBooking($booking);

        // 6. Dispatch the job to create the booking PDF and send it to the customer
        dispatch(new CreateBookingPdf($booking, true));
    }

    private function createCarenBooking(Booking $booking)
    {
        $api = new Api();

        $carenBooking = $api->createBooking($booking->carenParameters);

        // When "Success" is set, there has been an error (irony)
        if (isset($carenBooking["Success"])) {
            Log::error("Error creating booking in Caren. Booking ID: " . $booking->id . ". Error: " . $carenBooking["Message"]);
            return;
        }

        // Booking created successfully. We get the "Guid" in the response
        $booking->update([
            'caren_guid' => $carenBooking["Guid"]
        ]);

        // Save a booking log
        $booking->logs()->create([
            'message'    => 'Booking created in Caren'
        ]);

        // Save the booking info from Caren
        $bookingInfo = $api->bookingInfo([
            "RentalId" => $booking->vendor->caren_settings["rental_id"],
            "Guid" => $carenBooking["Guid"],
        ]);

        if (!isset($bookingInfo["Success"])) {
            $booking->update([
                'caren_id'      => $bookingInfo["Id"],
                'caren_info'    => $bookingInfo
            ]);
        }
    }
}
