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
     * for now, only one vendor is used and its data comes from caren
     */
    protected function setVendors()
    {
        if ($this->vendors->count() == 0) {
            $this->vendors = Vendor::whereNotNull('caren_settings')->get();
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
        if ($this->vendors->count() == 0) {
            $this->query = Car::fromCaren();
        } else {
            $this->query = Car::fromCaren()->whereIn('vendor_id', $this->vendors->pluck('id')->toArray());
        }
    }

    protected function searchSpecs()
    {
        if ($this->specs) {
            if (count($this->specs->getTypes()) > 0) {
                $this->query = Car::fromCaren()->whereIn('vehicle_type', $this->specs->getTypes());
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
        if ($this->dates->datesDefined() || $this->locations->locationsDefined()) {

            $params = [];
            $carsCarenIds = [];

            if ($this->dates->datesDefined()) {
                $params['dateFrom'] = $this->dates->getDateFrom();
                $params['dateTo']   = $this->dates->getDateTo();
            }

            if ($this->locations->locationsDefined()) {
                $params['PickupLocationId']     = $this->locations->getPickupLocation()->caren_settings['caren_pickup_location_id'];
                $params['DropoffLocationId']    = $this->locations->getDropoffLocation()->caren_settings['caren_dropoff_location_id'];
            }

            foreach ($this->vendors as $vendor) {
                $cars = $this->carenApi->carsByDates(
                    array_merge(
                        $params,
                        ["RentalId"  => $vendor->caren_settings['rental_id']]
                    )
                );

                if (isset($cars['Classes'])) {
                    $carsCarenIds = array_merge($carsCarenIds, array_column($cars['Classes'], 'Id'));

                    // Get the prices from Caren (daily and total)
                    foreach ($cars['Classes'] as $carenCar) {
                        $this->carenPrices[$carenCar['Id']] = [
                            'daily_price'   => $carenCar['DailyPrice'],
                            'total_price'   => $carenCar['TotalPrice'],
                        ];
                    }
                }
            }

            $this->query->whereIn('caren_id', $carsCarenIds);
        }
    }
}
