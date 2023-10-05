<?php

namespace App\Http\Controllers\Web;

use App\Services\Car\CarsSearch\InitialValues;
use App\Services\Car\CarsSearch\ValidateCarSearchDates;
use App\Services\Car\CarsSearch\ValidateCarSearchLocations;

class CarsController extends BaseController
{
    protected $dates;

    protected $locations;

    protected $validationErrors;

    public function __construct() {
        $initialValues = new InitialValues();

        $this->dates     = $initialValues->getDates(); 
        $this->locations = $initialValues->getLocations();
    }

    public function index()
    {
        if($this->validateValues()){  //it will show cars filtered by data

            checkSessionCar();

        } else { //it will show cars with a 'from price'

            $params = [
                'dataErrors' => $this->validationErrors
            ];
            
        }              

        $params = [
            'dates'     => $this->dates,
            'locations' => $this->locations
        ];   

        return view(
            'web.cars.index',
                array_merge(
                    [ 'breadcrumbs'   => getBreadcrumb(['home', 'cars']) ], 
                    $params
                    )
            );        
    }

    protected function validateValues() {

        $dates = new ValidateCarSearchDates($this->dates['from'], $this->dates['to']);

        $this->validationErrors = $dates->getErrors();

        $locations = new ValidateCarSearchLocations($this->locations['pickup'], $this->locations['dropoff']);

        $this->validationErrors = array_merge($dates->getErrors(), $locations->getErrors());

        return $dates->check() && $locations->check();
    }

    protected function footerImagePath() : string
    {
        return '/images/footer/cars.png';
    }
}

