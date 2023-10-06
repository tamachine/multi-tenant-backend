<?php

namespace App\Services\Car\CarBooking\Caren;

use App\Models\Affiliate;
use App\Models\Car;
use App\Services\Car\Caren\CarenValidation;
use Illuminate\Support\Facades\Validator;

class CarBookingValidation extends CarenValidation {
    
     /**
     * CarPricesData constructor.
     *
     * @param Car $car
     * @param array $params
     */
    public function __construct(Car $car, array $params) {
        $this->car = $car;
        $this->params = $params;    
        $this->carParams = new CarBookingParams();
        
        $this->validate();
    }
    
    /**
     * Validate the data.
     *
     * @return bool
     */
    protected function validate() {

        parent::validate();

        $this->valid = $this->valid && $this->validateDetails() && $this->validateAffiliate();
        
    }  

    protected function validateDetails():bool {

        if(!isset($this->params['details'])) {
            $this->errors[] = 'details are not set';
            return false;
        }

        if(!is_array($this->params['details'])) {
            $this->errors[] = 'details is not set correctly. It must be an array';
            return false;
        }

        $rules = [
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'email'         => ['required', 'email'],
            'telephone'     => ['required'],
            'address'       => ['required'],
            'postal_code'   => ['required'],
            'city'          => ['required'],
            'country'       => ['required'],
            'number_passengers' => 'required|numeric|min:1|max:12'
        ];

        $validator = Validator::make($this->params['details'], $rules);

        if ($validator->fails()) {
            
            $this->errors[] = $validator->errors()->all();
            
            return false;
        } else {
            
            $this->carParams->details = $this->params['details'];

            return true;
        }
    }

    protected function validateAffiliate():bool {

        if(isset($this->params['affiliate'])) {

            $affiliate = Affiliate::findByHashid($this->params['affiliate']);

            if($affiliate->exists()) {
                $this->carParams->affiliate = $affiliate;

                return true;
            }

            $this->errors[] = 'Affiliate does not exists';

            return false;

        } else {

            return true;

        }        
        
    }
}