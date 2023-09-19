<?php

namespace App\Services\CarsSearch;

use App\Models\Car;
use App\Helpers\CarsFilters;
/**
 * 
 * This class checks and gets the the specs for carsSearch class
 */
class Specs
{                   
    protected $types;     
    protected $transmission;
    protected $road;
    protected $seats;
    protected $engine;

    /**
     * @var string[]  vehicle type in cars table    
     */
    public function setTypes(array $types = []) {
        $this->types = $types; 

        $this->check();
    }

    /**     
     * @var string    transmission column in cars table
     * @var string    f_roads_name in cars table
     * @var int       adult_passengers in cars table
     * @var string    engine in cars table
     */
    public function setSpecs(array $specs = []) {
        $this->transmission = (isset($specs['transmission']) ? $specs['transmission'] : null);     
        $this->road         = (isset($specs['road'])         ? $specs['road']         : null);     
        $this->seats        = (isset($specs['seat'])         ? $specs['seat']         : null);     
        $this->engine       = (isset($specs['engine'])       ? $specs['engine']       : null);   

        $this->check();
    }
    
    /**
     * Returns all the specs except the types with its columns name in cars table
     */
    public function getSpecsWithoutTypes():array {
        return [
            'transmission' => $this->transmission,
            'f_roads_name' => $this->road,
            'adult_passengers' => $this->seats,
            'engine' => $this->engine,
        ];
    }

    public function getTypes(): ?array {
        return $this->types;
    }

    public function getTransmission(): ?string {
        return $this->transmission;
    } 

    public function getSeats(): ?int {
        return $this->seats;
    }

    public function getEngine(): ?string {
        return $this->engine;
    }

    public function getRoad(): ?string {
        return $this->road;
    }

    protected function check() {
        $this->checkTypes();
        $this->checkTransmission();
        $this->checkRoad();
        $this->checkSeats();
        $this->checkEngine();
    }

    protected function checkTypes() {
        $this->types = array_intersect(config('car-specs.type'), $this->types);
    } 

    protected function checkTransmission() {
        $this->transmission = in_array($this->transmission, config('car-specs.transmission')) ? $this->transmission: null;
    }  
   
    protected function checkRoad() {
        $this->road = in_array($this->road, config('car-specs.road')) ? $this->road: null;
    } 

    protected function checkSeats() {
        if(is_numeric($this->seats)) {
            $this->seats = intval($this->seats);
            if ($this->seats <= 0) {
                $this->seats = null;
            }
        } else {
            $this->seats = null;
        }
    } 

    protected function checkEngine() {
        $this->engine = in_array($this->engine, config('car-specs.engine')) ? $this->engine: null;
    } 
}

?>