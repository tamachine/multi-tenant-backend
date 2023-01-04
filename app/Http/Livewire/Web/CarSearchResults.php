<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App\Models\Car;
use App\Services\SelectableFull\AllSelectables;
use App\Services\SelectableFull\SelectableFullItem;
use App\Services\CarsSearch\CarsSearch;
use App\Services\CarsSearch\Specs;

class CarSearchResults extends Component
{
    public $cars; 

    public $categories = [];
    public $selectables= [];

    protected $allSelectables;
    protected $query;
    protected $carsSearch;

    public function boot(AllSelectables $allSelectables, CarsSearch $carsSearch) {
        $this->allSelectables = $allSelectables;
        $this->carsSearch = $carsSearch;
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
        $this->carsSearch->setData(
            [
                'types' => $this->categories, 
                'specs' => $this->selectables
            ]
        );                      

        $this->cars = $this->carsSearch->getCars();
    }

    protected function setCategory($categoryId) {
        if(isset($this->categories[$categoryId])) {
            unset($this->categories[$categoryId]);
        } else {
            $this->categories[$categoryId] = $categoryId;
        }  
    }

    protected function setSelectable($selectableId, $value) {
        if($value){
            $this->selectables[$selectableId] = $value;
        } else {
            if(isset($this->selectables[$selectableId])) {
                unset($this->selectables[$selectableId]);
            }
        }            
    }

    protected function setSelectables() {
        foreach($this->allSelectables->getAll() as $instance => $selectable) {
            $this->setSelectable($instance, $selectable->getAllItemValue());
        }  
    }
}
