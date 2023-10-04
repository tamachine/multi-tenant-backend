<?php

namespace App\Services\Car\CarsSearch;

use App\Services\Car\CarsSearch\Dates;
use App\Services\Car\CarsSearch\Locations;
use App\Services\Car\CarsSearch\Specs;
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

    /**
     * @var array
     */
    protected $carenPrices = [];

    public function __construct(Api $carenApi)
    {
        $this->carenApi = $carenApi;        
    }

    /**
     * @var Specs
     * @var Locations
     * @var Dates
     * @var Vendor[]
     */
    public function handle(Specs $specs, Locations $locations, Dates $dates, $vendors = [])
    {
        $this->specs = $specs;
        $this->locations = $locations;
        $this->dates = $dates;
        $this->vendors = collect($vendors);

        $this->setVendors();
        $this->setQuery();
    }

    public function get()
    {
        $results = $this->query->get();

        foreach ($results as $result) {
            $result['daily_price'] = $this->carenPrices[$result->caren_id]['daily_price'];
            $result['total_price'] = $this->carenPrices[$result->caren_id]['total_price'];
        }

        return $results;
    }

    /**
     * There are two kinds of search: carsByDates and fullCarList
     * For the first one we need dates data and prices come from caren, from the second one, we don't need dates data and prices come from database
     * @return boolean
     */
    public function searchByDates() {
        return $this->dates->datesDefined();
    }

    /**
     * for now, only one vendor is used and its data comes from caren
     */
    protected function setVendors()
    {
        if ($this->vendors->count() == 0) {
            $this->vendors = Vendor::Active()->whereNotNull('caren_settings')->get();
        }
    }

    protected function setQuery()
    {
        $this->initSearch();
        $this->searchCaren();
        $this->searchSpecs();
    }

    protected function initSearch()
    {
        $this->query = Car::fromCaren()->Active();
        
        if ($this->vendors->count() > 0) {
            $this->query->whereIn('vendor_id', $this->vendors->pluck('id')->toArray());
        }
    }

    protected function searchSpecs()
    {
        if ($this->specs) {
            if (count($this->specs->getTypes()) > 0) {
                $this->query = Car::fromCaren()->Active()->whereIn('vehicle_type', $this->specs->getTypes());
            }

            foreach ($this->specs->getSpecsWithoutTypes() as $column => $value) {
                if ($value) {
                    $this->query->where($column, $value);
                }
            }
        }
    }

    protected function searchCaren()
    {

        $params = [];
        
        if ($this->dates->datesDefined()) {
            $params['dateFrom'] = $this->dates->getDateFrom();
            $params['dateTo']   = $this->dates->getDateTo();
        }

        if ($this->locations->locationsDefined()) {
            $params['PickupLocationId']     = $this->locations->getPickupLocation()->caren_settings['caren_pickup_location_id'];
            $params['DropoffLocationId']    = $this->locations->getDropoffLocation()->caren_settings['caren_dropoff_location_id'];
        }

        foreach ($this->vendors as $vendor) {

            if($this->searchByDates()) {
                $carenApiEndPoint = "carsByDates";
            } else {
                $carenApiEndPoint = "fullCarList";
            }

            $cars = $this->carenApi->$carenApiEndPoint(
                array_merge(
                    $params,
                    ["RentalId"  => $vendor->caren_settings['rental_id']]
                )
            );

            if (isset($cars['Classes'])) {
                                
                foreach ($cars['Classes'] as $carenCar) {
                    $carenId = $carenCar['Id'];
                    
                    $this->carenPrices[$carenId] = [
                        'daily_price'   => $this->searchByDates() ? $carenCar['DailyPrice'] : Car::where('caren_id', $carenId)->first()?->price_from,
                        'total_price'   => $carenCar['TotalPrice'],
                    ];
                }

            } 
        }

        $this->query->whereIn('caren_id', array_keys($this->carenPrices));
        
    }
}
