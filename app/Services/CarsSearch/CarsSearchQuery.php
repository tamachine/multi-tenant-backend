<?php

namespace App\Services\CarsSearch;

use App\Services\CarsSearch\Dates;
use App\Services\CarsSearch\Locations;
use App\Services\CarsSearch\Specs;
use App\Apis\Caren\Api;
use App\Models\Car;
use App\Models\Vendor;

/**
 * 
 * This class build the query for car searching based on different filters (dates, locations and car specifications)
 */
class CarsSearchQuery
{       
    protected $query;
    protected $carenApi;

    protected $dates; 
    protected $locations;     
    protected $specs; 

    protected $vendors;

    public function __construct(Api $carenApi) {        
        $this->carenApi = $carenApi;        
    }    

    /**
     * @var Specs
     * @var Locations
     * @var Dates
     * @var Vendor[]
     */
    public function handle(Specs $specs, Locations $locations, Dates $dates, $vendors = []) {
        $this->specs = $specs;
        $this->locations = $locations;
        $this->dates = $dates;
        $this->vendors = collect($vendors);

        $this->setVendors();
        $this->setQuery();
    }

    public function get() {
        return $this->query->get();
    }

    /**
     * for now, only one vendor is used and its data comes from caren
     */
    protected function setVendors() {
        if($this->vendors->count() == 0) {
            $this->vendors = Vendor::whereNotNull('caren_settings')->get();
        }        
    }

    protected function setQuery() {      
        $this->initSearch();
        $this->searchCaren();       
        $this->searchSpecs();           
    }

    protected function initSearch() {
        if($this->vendors->count() == 0) {
            $this->query = Car::query();
        } else {
            $this->query = Car::whereIn('vendor_id', $this->vendors->pluck('id')->toArray());      
        }        
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

    protected function searchCaren() {
        if($this->dates->datesDefined() || $this->locations->locationsDefined()) {    
            
            $params = [];

            if ($this->dates->datesDefined()) {
                $params = [
                    'dateFrom'  => $this->dates->getDateFrom(),
                    'dateTo'    => $this->dates->getDateTo()
                ];
            }
            
            if ($this->locations->locationsDefined()) {
                $params = [
                    'PickupLocationId'  => $this->locations->getPickupLocation()->caren_settings['caren_pickup_location_id'],
                    'DropoffLocationId' => $this->locations->getDropoffLocation()->caren_settings['caren_dropoff_location_id'],
                ];
            }
            
            foreach($this->vendors as $vendor) {
                $cars = $this->carenApi->carsByDates(
                    array_merge(
                        $params, 
                        [ "RentalId"  => $vendor->caren_settings['rental_id']]
                    )
                );
                
                if(isset($cars['Classes'])) {
                    $carsCarenIds = array_column($cars['Classes'], 'Id');

                    $this->query->whereIn('caren_id', $carsCarenIds);
                } 
            }
        }        
    }
}