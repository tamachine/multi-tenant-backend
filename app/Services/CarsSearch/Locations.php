<?php

namespace App\Services\CarsSearch;

use App\Models\Location;
/**
 * 
 * This class gets the the locations for carsSearch class
 */
class Locations
{               
    protected $startLocation;
    protected $endLocation;        

    protected $locationsDefined = false;
    
    public function __construct(int $startLocationId = null, int $endLocationId = null) {
        $this->startLocation = Location::find($startLocationId);
        $this->endLocation   = Location::find($endLocationId);     

        $this->check();
    }        

    protected function check() {
        if($this->startLocation == null && $this->endLocation != null) {
            $this->startLocation = $this->endLocation;            
        }

        if($this->endLocation == null && $this->startLocation != null) {
            $this->endLocation = $this->startLocation;            
        }       
    }

    public function locationsDefined() {
        return $this->startLocation != null;
    }

    public function getStartLocation() {
        return $this->startLocation;
    }
    
    public function getEndLocation() {
        return $this->endLocation;
    }
}

?>