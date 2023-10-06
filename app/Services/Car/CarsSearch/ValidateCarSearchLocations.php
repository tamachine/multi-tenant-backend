<?php

namespace App\Services\Car\CarsSearch;

use App\Models\Location;
use App;

/**
 * This class validates the values in the car search bar in order to check if they are correct for the search 
 */
class ValidateCarSearchLocations {

    protected $locationFrom;

    protected $locationTo;

    protected $errors = [];

    public function __construct($locationFrom, $locationTo) {
        $this->locationFrom = $locationFrom;
        $this->locationTo = $locationTo;
        
        $this->handle();
    }

    public function check() {
        return (count($this->errors) == 0);
    }

    public function getErrors() {   
        return $this->errors;
    }

    protected function handle() {
        if(Location::where('hashid', '=', $this->locationFrom)->count() == 0) {
            $this->errors['location-from'] = 'Location from not valid';
        };
            
        if(Location::where('hashid', '=', $this->locationTo)->count() == 0) {
            $this->errors['location-to'] = 'Location to not valid';
        };
    }
}