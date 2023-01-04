<?php

namespace App\Services\CarsSearch;

use Carbon\Carbon;

/**
 * 
 * This class gets the the dates for carsSearch class
 */
class Dates
{       
    const DEFAULT_RANGE_DAYS = 14;
    
    protected $startDate;
    protected $endDate;    
    protected $datesDefined = false;

    /**
     * @var string 'd-m-y'
     * @var string 'd-m-y'
     */
    public function __construct($startDate = null, $endDate = null) {
        $this->startDate = $startDate;
        $this->endDate   = $endDate;

        $this->format();        
        $this->setEndDate();
    }        

    protected function format(){        
        if($this->startDate != null){
            $this->startDate = Carbon::parse($this->startDate);
        }
        if($this->endDate != null){
            $this->endDate = Carbon::parse($this->endDate);
        }        
    }

    protected function setEndDate() {
        if($this->startDate == null) {
            $this->endDate = null;
        } elseif($this->endDate == null) {
            $this->endDate = $this->startDate->copy();
            $this->endDate->addDays(self::DEFAULT_RANGE_DAYS);

            $this->datesDefined = true;
        }
    }

    public function datesDefined() {
        return $this->datesDefined;
    }

    public function getStartDate() {
        return $this->startDate;
    }
    
    public function getEndDate() {
        return $this->endDate;
    }
}

?>