<?php 

namespace App\Services\Car\CarBooking\Caren;

use App\Models\Affiliate;
use App\Models\Extra;
use App\Models\Insurance;
use App\Services\Car\Caren\CarenParams;

class CarBookingParams extends CarenParams {
    
    public array $extras = []; //array of ['extra' => 'App\Models\Extra instance', 'quantity' => int]
    public array $insurances = []; //array of 'App\Models\Insurance'
    public array $details = [];
    public Affiliate|null $affiliate = null;

    public function setExtras(array $value) {
        $extras = [];

        foreach($value as $hashid => $quantity) {  
            $extra = Extra::findByHashid($hashid);    
            
            if($extra->exists()) $extras[] = ['extra' => $extra, 'quantity' => $quantity];            
        }

        $this->extras = $extras;
    }

    public function setInsurances(array $value) {
        $insurances = [];

        foreach($value as $hashid) {
            $insurance = Insurance::findByHashid($hashid);

            if($insurance->exists()) $insurances[] = $insurance;            
        }

        $this->insurances = $insurances;
    } 
    
}