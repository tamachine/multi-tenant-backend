<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App\Models\Car;
use App\Services\SelectableFull\AllSelectables;
use App\Services\SelectableFull\SelectableFullItem;

class CarSearchResults extends Component
{
    public $cars; 

    public $categories = [];
    public $selectables= [];

    protected $allSelectables;
    protected $query;

    public function boot(AllSelectables $allSelectables) {
        $this->allSelectables = $allSelectables;
    }

    public function mount() {        
        $this->carSearch();  
        $this->setSelectables();      
    }

    public function click($categoryId)
    {                      
        $this->setCategory($categoryId);
        $this->carSearch();
    }

     /**
     * @var array selectableFullComponent json (using jsonSerialize in SelectableFullAbstract)
     * @var array selectableFullItem json (using jsonSerialize in SelectableFullItem)
     */
    public function clickSelectable(array $selectableFullComponent, array $selectableFullItem)
    {
        $this->setSelectable($selectableFullComponent['instance'], $selectableFullItem['value']);
        $this->carSearch();
    }

    public function render()
    {
        return view('livewire.web.car-search-results');
    }    

    protected function carSearch()
    {                
        if(count($this->categories) > 0) {
            $this->query = Car::whereIn('vehicle_type', $this->categories);
        } else {
            $this->query = Car::query();
        }        

        foreach($this->selectables as $selectableId => $value) {
            $selectableComponent = $this->allSelectables->getInstance($selectableId);
            
            $currentSelectableValue = $this->selectables[$selectableId];

            if($currentSelectableValue != $selectableComponent->getAllItemValue()) {
                $this->query->where($selectableComponent->getColumnName(), $value);
            }            
        }

        $this->cars = $this->query->get();
    }

    protected function setCategory($categoryId) {
        if(isset($this->categories[$categoryId])) {
            unset($this->categories[$categoryId]);
        } else {
            $this->categories[$categoryId] = $categoryId;
        }  
    }

    protected function setSelectable($selectableId, $value) {
        $this->selectables[$selectableId] = $value;
        
    }

    protected function setSelectables() {
        foreach($this->allSelectables->getAll() as $instance => $selectable) {
            $this->setSelectable($instance, $selectable->getAllItemValue());
        }  
    }
}
