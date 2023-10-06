<?php 

namespace App\Services\Car\Caren;

use App\Models\Car;
use App\Models\Extra;
use App\Models\Insurance;
use App\Models\Location;
use DateTime;

/**
 * Represents parameters related to Caren car services.
 */
class CarenParams {
        
    public Car $car;  // Represents the car object or data.
    public string $dateFrom;  // Start date for the car service.
    public string $dateTo;  // End date for the car service.
    public Location $pickupLocation;  // Location object where the car will be picked up.
    public Location $dropoffLocation;  // Location object where the car will be dropped off.
    public int $carenPickupLocationId;  // ID related to Caren's pickup location.
    public int $carenDropoffLocationId;  // ID related to Caren's dropoff location.
    public array $extras = [];  // Array of additional services or items.
    public array $insurances = [];  // Array of insurance options.

    /**
     * Set the start date for the car service.
     *
     * @param string $value  The date value to be set.
     */
    public function setDateFrom($value) {
        $date = new DateTime($value);
        
        $this->dateFrom = $date->format('Y-m-d H:i:s');
    }

    /**
     * Set the end date for the car service.
     *
     * @param string $value  The date value to be set.
     */
    public function setDateTo($value) {
        $date = new DateTime($value);

        $this->dateTo = $date->format('Y-m-d H:i:s');
    }

    /**
     * Set the pickup location based on a hashid.
     *
     * @param string $hashid  The hashid related to the pickup location.
     */
    public function setPickupLocation($hashid) {
        $location = Location::findByHashid($hashid);

        $this->pickupLocation        = $location;
        $this->carenPickupLocationId = $location->carenLocation->caren_pickup_location_id;
    }

    /**
     * Set the dropoff location based on a hashid.
     *
     * @param string $hashid  The hashid related to the dropoff location.
     */
    public function setDropoffLocation($hashid) {
        $location = Location::findByHashid($hashid);

        $this->dropoffLocation        = $location;
        $this->carenDropoffLocationId = $location->carenLocation->caren_dropoff_location_id;
    }

    /**
     * Set the extras based on an array of hashids and quantities.
     *
     * @param array $value  Array of hashids and their corresponding quantities.
     */
    public function setExtras(array $value) {
        $extras = [];

        foreach($value as $hashid => $quantity) {            
            $carenId = optional(Extra::caren()->findByHashid($hashid))->caren_id ?? null; // Add only Caren extras
            if($carenId) $extras[] = [$carenId , $quantity];
        }

        $this->extras = $extras;
    }

    /**
     * Set the insurances based on an array of hashids.
     *
     * @param array $value  Array of hashids related to insurances.
     */
    public function setInsurances(array $value) {
        $insurances = [];

        foreach($value as $hashid) {
            $carenId = Insurance::findByHashid($hashid)->caren_id;
            $insurances[] =  $carenId;
        }

        $this->insurances = $insurances;
    }   
}
