<?php

namespace App\Services\Car\CarsSearch;

use Carbon\Carbon;

/**
 * 
 * This class gets the the dates for carsSearch class
 */
class Dates
{       
    const DEFAULT_RANGE_DAYS = 14;
    const FORMAT = 'Y-m-d g:i A';
    
    protected $dateFrom;
    protected $dateTo;    
    protected $datesDefined = false;

    /**     
     * @var string[]  $dates['from' => 'd-m-y H:m', 'to' => 'd-m-Y H:m']     
     */
    public function setDates(array $dates = []) {
        $this->dateFrom = (isset($dates['from']) ? $dates['from'] : null);     
        $this->dateTo   = (isset($dates['to'])   ? $dates['to']   : null);     

        $this->setDefaultDates();
        
        $this->format();        
        $this->setEndDate();
        $this->setDatesDefined();        
    }

    public function datesDefined() {
        return $this->datesDefined;
    }

    public function getDateFrom($formatted = true) {        
        if ($formatted) {
            return $this->dateFrom->format(self::FORMAT);
        } else {
            return $this->dateFrom;
        }
    }
    
    public function getDateTo($formatted = true) {
        if ($formatted) {
            return $this->dateTo->format(self::FORMAT);
        } else {
            return $this->dateTo;
        }        
    }

    protected function setDefaultDates() {
        if($this->dateFrom == null && $this->dateTo == null) {
            $this->dateFrom = null; //Carbon::tomorrow()->format(self::FORMAT);            
        }
    }

    protected function format(){        
        if($this->dateFrom != null){
            $this->dateFrom = Carbon::parse($this->dateFrom);
        }
        if($this->dateTo != null){
            $this->dateTo = Carbon::parse($this->dateTo);
        }        
    }

    protected function setEndDate() {
        if($this->dateFrom == null) {
            $this->dateTo = null;
        } elseif($this->dateTo == null) {
            $this->dateTo = $this->dateFrom->copy();
            $this->dateTo->addDays(self::DEFAULT_RANGE_DAYS);            
        }
    }

    protected function setDatesDefined() {
        $this->datesDefined = ($this->dateFrom != null);
    }   
}

?>