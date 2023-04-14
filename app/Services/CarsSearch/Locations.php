<?php

namespace App\Services\CarsSearch;

use App\Models\Location;
use App\Models\CarenLocation;
/**
 *
 * This class gets the the locations for carsSearch class
 */
class Locations
{
    protected $pickupLocation;
    protected $dropoffLocation;

    protected $locationsDefined = false;

     /**
     * @var string[]  $locations[pickup' => Location hashid, 'dropoff' => hashid]
     */
    public function setLocations(array $locations = []) {
        $this->pickupLocation  = (isset($locations['pickup'])  ? Location::find(dehash($locations['pickup']))  : null);
        $this->dropoffLocation = (isset($locations['dropoff']) ? Location::find(dehash($locations['dropoff'])) : null);

        $this->setDefaultLocations();

        $this->check();
    }

    protected function setDefaultLocations() {
        if($this->pickupLocation == null && $this->dropoffLocation == null) {
            $this->pickupLocation = CarenLocation::whereNotNull('caren_pickup_location_id')->first()->location;            
        }
    }

    protected function check() {
        if($this->pickupLocation == null && $this->dropoffLocation != null) {
            $this->pickupLocation = $this->dropoffLocation;
        }

        if($this->dropoffLocation == null && $this->pickupLocation != null) {
            $this->dropoffLocation = $this->pickupLocation;
        }
    }

    public function locationsDefined() {
        return $this->pickupLocation != null;
    }

    public function getPickupLocation() {
        return $this->pickupLocation;
    }

    public function getDropoffLocation() {
        return $this->dropoffLocation;
    }
}

?>
