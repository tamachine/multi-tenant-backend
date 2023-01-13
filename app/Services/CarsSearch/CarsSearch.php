<?php

namespace App\Services\CarsSearch;

use App\Services\CarsSearch\Dates;
use App\Services\CarsSearch\Locations;
use App\Services\CarsSearch\Specs;

/**
 * 
 * This class gets the available cars based on different filters (dates, locations and car specifications)
 */
class CarsSearch
{       
    protected $data = [];
    protected $carsSearchQuery;

    protected $dates; 
    protected $locations;     
    protected $specs; 
    protected $vendors;

    protected $carenApi;  

    public function __construct(Specs $specs, Locations $locations, Dates $dates, CarsSearchQuery $carsSearchQuery) {        
        $this->carsSearchQuery = $carsSearchQuery;
        $this->specs = $specs;
        $this->locations = $locations;
        $this->dates = $dates;
    }    

    /**
     * @var array 
     * $data [
     *          'types' => array['large', 'small', 'medium', '4x4', 'premium', 'minivans', ... ], -> config car-specs.types
     *          'specs' => array['engine' => 'gas|diesel|..', 'road' => '4wd|fwd|..', 'transmission' => 'manual|automatic|..', 'seat' => '2|3|4|..' -> values for each one in config car-specs.(spec)
     *          'dates' => array['from' => 'd-m-y H:m', 'to' => 'd-m-y H:m']
     *          'locations'  => Location[] ['pickup' => 'locationHashId', 'dropoff' => 'locationHashId'] -> not 'caren location id' but 'location locationHashId'
     *          'vendors' => ['vendor1','vendor2' ... ] if empty, all vendors will be included
     *       ]
     */
    public function setData($data = []) {
        $this->data = $data;
        
        $this->setVendors();
        $this->setTypes();
        $this->setSpecs();           
        $this->setDates();  
        $this->setLocations();  
    }

    public function getCars() {
        $this->carsSearchQuery->handle($this->specs, $this->locations, $this->dates, $this->vendors);

        return $this->carsSearchQuery->get();
    }      

    protected function setVendors() {
        if(isset($this->data['vendors'])) {
            $this->vendors =$this->data['vendors'];
        }            
    }

    protected function setTypes() {
        if(isset($this->data['types'])) {
            $this->specs->setTypes($this->data['types']);
        }            
    }

    protected function setSpecs() {
        $data = [];
        $key = 'specs';

        $this->setParam($data, $key, 'transmission');
        $this->setParam($data, $key, 'road');
        $this->setParam($data, $key, 'engine');
        $this->setParam($data, $key, 'seat');
        
        $this->specs->setSpecs($data);
    }

    protected function setDates() {
        $data = [];
        $key = 'dates';

        $this->setParam($data, $key, 'from');
        $this->setParam($data, $key, 'to');

        $this->dates->setDates($data);
    }

    protected function setLocations() {
        $data = [];
        $key = 'locations';

        $this->setParam($data, $key, 'pickup');
        $this->setParam($data, $key, 'dropoff');

        $this->locations->setLocations($data);
    }

    protected function setParam(&$data, $key, $subKey) {
        if(isset($this->data[$key][$subKey])) {
            $data[$subKey] = $this->data[$key][$subKey];
        }
    } 
}

?>