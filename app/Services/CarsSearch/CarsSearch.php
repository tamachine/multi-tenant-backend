<?php

namespace App\Services\CarsSearch;

use App\Services\CarsSearch\Dates;
use App\Services\CarsSearch\Locations;
use App\Services\CarsSearch\Specs;
use App\Models\Car;
use App\Apis\Caren\Api;

/**
 * 
 * This class gets the available cars based on different filters (dates, locations and car specifications)
 */
class CarsSearch
{       
    protected $data = [];
    protected $dates; 
    protected $locations;     
    protected $specs; 

    protected $query;

    protected $carenApi;

    
    public function __construct(Specs $specs, Api $carenApi) {        
        $this->carenApi = $carenApi;
        $this->specs = $specs;
    }    

    /**
     * @var array 
     * $data [
     *          'types' => array['large', 'small', 'medium', '4x4', 'premium', 'minivans', ... ], -> config car-specs.types
     *          'specs' => array['engine', 'road', 'transmission', 'seat' -> values for each one in config car-specs.(spec)
     *       ]
     */
    public function setData($data = []) {
        $this->data = $data;
        
        $this->setTypes();
        $this->setSpecs();   
    }

    public function getCars() {
        $this->setQuery();

        return $this->query->get();
    }

    protected function setTypes() {
        if(isset($this->data['types'])) {
            $this->specs->setTypes($this->data['types']);
        }            
    }

    protected function setSpecs() {
        $specs = [];

        $this->setSpec($specs, 'transmission');
        $this->setSpec($specs, 'road');
        $this->setSpec($specs, 'engine');
        $this->setSpec($specs, 'seats');
        
        $this->specs->setSpecs($specs);
    }

    protected function setSpec(&$specs, $spec) {
        if(isset($this->data['specs'][$spec])) {
            $specs[$spec] = $this->data['specs'][$spec];
        }
    }

    protected function setQuery() {      
        $this->initSearch();
        $this->searchSpecs();             
    }

    protected function initSearch() {
        $this->query = Car::query();  
    }

    protected function searchSpecs() {
        if($this->specs) {
            if(count($this->specs->getTypes()) > 0) {
                $this->query = Car::whereIn('vehicle_type', $this->specs->getTypes());
            }  
    
            foreach($this->specs->getSpecsWithoutTypes() as $column => $value) {
                if ($value) {
                    $this->query->where($column, $value);
                }
            }
        }         
    }

    protected function searchDates() {
        
    }
}

?>