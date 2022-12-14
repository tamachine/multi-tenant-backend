<?php

namespace App\Services\Selectable;

use App\Contracts\SelectableComponent;
use App\Services\Selectable\SelectableAbstract;

class CarSearchHoursSelectableComponent extends SelectableAbstract implements SelectableComponent 
{    
    protected $hours = []; //HH:MM 24h key - hh:MM12h value 
    protected $stepMinutes = 30; //time every 30 minutes

    public function __construct() {
        $this->setItems();
    }

    public function getItems(): array
    {        
        return $this->hours;   
    }   

    public function getDefaultSelectedValue() : string //24h format
    {
        return "10:00";
    }

    protected function setItems() {

        for($h=0; $h<=23; $h++) {       

            for($m=0; $m<60; $m++) {      

                $this->hours[$this->format24h($h,$m)] = $this->format12h($h,$m); 
                
                $m = $this->addStepMinutes($m) -1;
            }

        }   
        
    }

    protected function prependTime($time, $prepend = 2) {
        return str_pad($time, 2, '0', STR_PAD_LEFT);
    }

    protected function addStepMinutes($m) {
        return $m + $this->stepMinutes;
    }

    protected function convertTo12h($hour24) {        
        return $hour24 > 12 ? $hour24 -12 : $hour24;
    }    

    protected function format24h($h,$m) {
        return $h . ":" . $this->prependTime($m);
    }

    protected function format12h($h,$m) {
        return $this->convertTo12h($h) . ":" . $this->prependTime($m) . " " . $this->getMeridiem($h);
    }

    protected function getMeridiem($h) {
        return $h > 11 ? __('general.post-meridiem') : __('general.after-meridiem');
    }
}

?>