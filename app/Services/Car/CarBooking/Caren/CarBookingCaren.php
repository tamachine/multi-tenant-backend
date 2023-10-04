<?php 

namespace App\Services\Car\CarBooking\Caren;

use App\Jobs\CreateCarenBooking;
use App\Models\Booking;
use App\Models\Car;
use App\Services\Car\CarBooking\CarBookingInterface;
use App\Services\Car\CarPrices\CarPrices;
use Illuminate\Support\Facades\Log;

class CarBookingCaren implements CarBookingInterface{
 
    protected Car $car;     
    
    protected array $errors = [];
    
    protected array $params;
    
    protected CarBookingParams $carBookingParams;

    protected CarPrices $carPrices;

    public function __construct(CarPrices $carPrices) {
        $this->carPrices = $carPrices;
    }

    public function setCar(Car $car) {
        $this->car = $car;
    }

    public function setParams(array $params) {
        $this->params = $params;
    }
    
    public function validateData(): bool {
        $carBookingValidation = new CarBookingValidation($this->car, $this->params);

        $this->errors           = $carBookingValidation->getErrors();
        $this->carBookingParams = $carBookingValidation->getParams();

        return $carBookingValidation->isValid();
    }

    public function errors(): array {
        return $this->errors;
    }

    public function create(): Booking|false {
        $prices = $this->carPrices->getPrices($this->carBookingParams->car, $this->params);

        if(!$prices) {
            $this->errors = $prices->errors();

            return false;
        }

        try {
        
            $booking = Booking::create([
                'car_id' => $this->carBookingParams->car->id,
                'car_name' => $this->carBookingParams->car->name,
                
                'vendor_id' => $this->carBookingParams->car->vendor->id,
                'vendor_name' => $this->carBookingParams->car->vendor->name,
                
                'pickup_location' => $this->carBookingParams->pickupLocation->id,
                'pickup_at' => $this->carBookingParams->dateFrom,
                'pickup_name' => $this->carBookingParams->pickupLocation->name,

                'dropoff_location' => $this->carBookingParams->dropoffLocation->id,
                'dropoff_at' => $this->carBookingParams->dateTo,
                'dropoff_name' => $this->carBookingParams->dropoffLocation->name,

                'rental_price' => $prices->carPrice,
                'extras_price' => $prices->extrasTotal(),
                'total_price' => $prices->total,
                'online_payment' => $prices->payNow,

                'first_name' => $this->carBookingParams->details['first_name'],
                'last_name' => $this->carBookingParams->details['last_name'],
                'email' => $this->carBookingParams->details['email'],
                'telephone' =>$this->carBookingParams->details['telephone'],
                'address' => $this->carBookingParams->details['address'],
                'postal_code' => $this->carBookingParams->details['postal_code'],
                'city' => $this->carBookingParams->details['city'],
                'country' => $this->carBookingParams->details['country'],
                'number_passengers' => $this->carBookingParams->details['number_passengers'],

                'affiliate_id' => $this->carBookingParams->affiliate?->id,
                'affiliate_commission' => $this->carBookingParams->affiliate
                    ? round($prices->payNow * $this->carBookingParams->affiliate->commission_percentage / 100)
                    : null,
            ]);           

            // Add the insurances
            foreach( $this->carBookingParams->insurances as $insurance) {
                $booking->bookingExtras()->create([
                    'extra_id'  => $insurance->id,
                    'units'     => 1,
                ]);
            }

            // Add the extras
            foreach($this->carBookingParams->extras as $key => $extra) {
                $booking->bookingExtras()->create([
                    'extra_id'  => $extra['extra']->id,
                    'units'     => $extra['quantity'],
                ]);
            }

            // Save a booking log
            $booking->logs()->create([
                'message'    => 'Booking created'
            ]);  

            // Create booking in caren
            dispatch(new CreateCarenBooking($booking)); 

            return $booking->refresh();

        } catch(\Exception $e) {

            $this->errors[] = 'error creating booking';

            Log::error($e->getMessage() . ': ' . $e->getFile() . '(' . $e->getLine() . ')');

            return false;
        }
        
    }
}