<?php

namespace App\Http\Controllers\Web;

use App\Services\CarsSearch\InitialValues;
use App\Services\CarsSearch\ValidateCarSearchDates;
use App\Services\CarsSearch\ValidateCarSearchLocations;

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
        if($this->validateValues()){     
            
            checkSessionCar();

            $params = [
                'dates'     => $this->dates,
                'locations' => $this->locations
            ];                      
        } else {
            $params = [
                'errors' => $this->validationErrors
            ];
        }

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

