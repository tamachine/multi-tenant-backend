<?php

namespace App\Services\SelectableFull;

use App\Services\SelectableFull\SelectableFullComponentInterface;
use App\Services\SelectableFull\SelectableFullAbstract;
use App\Helpers\CarsFilters;
use App\Services\SelectableFull\SelectableFullItem;

class TransmissionSelectableFullComponent extends SelectableFullAbstract implements SelectableFullComponentInterface 
{    
    protected $transmissions = [];

    public function __construct() {
        $this->setTransmissions();             
    }

    /**
     * @return SelectableFullItem[]
     */
    public function getItems(): array {
        return $this->transmissions;    
    }  
    
    public function getDefaultSelectedValue(): string {
        return 'all';
    }

    public function getTitle(): string {
        return __('cars.filters-transmission');
    }   

    public function getIconPath(): ?string {
        return asset('images/cars/filters/transmission.svg');
    }     

    /**
     * @return array 
     * Array
     * (
     * [auto] => auto
     * [manual] => manual
     * ...
     * )
     */
    protected function setTransmissions() {
        $transmissions = CarsFilters::transmissions();

        foreach($transmissions as $transmission) {            
            $item = $this->getItem(__('cars.filters-transmission-'.$transmission), $transmission);
            $this->transmissions[$item->value] = $item;
        } 

        $this->addAllItem($this->transmissions);
    }    
}
?>