<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App\Services\SelectableFull\AllSelectables;
use App\Services\CarsSearch\CarsSearch;

class CarSearchResults extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    public $cars;

    public $categories = [];
    public $selectables= [];
    public $dates = [];
    public $locations = [];

    protected $allSelectables;
    protected $query;
    protected $carsSearch;

    public $showFilters;    
    public $showImageIfLittleResults;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function boot(AllSelectables $allSelectables, CarsSearch $carsSearch) {
        $this->allSelectables = $allSelectables;
        $this->carsSearch = $carsSearch;
    }

    public function mount(bool $showFilters = true, bool $showImageIfLittleResults = false, array $categories = [], array $dates = [], array $locations = []) {        
        $this->showFilters              = $showFilters;
        $this->showImageIfLittleResults = $showImageIfLittleResults;
        $this->categories               = $categories;
        $this->dates                    = $dates;
        $this->locations                = $locations;

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

    /**
     * @param   string  $hashid
     * @return  void
     */
    public function selectCar($hashid)
    {
        // Select the car
        $sessionData = request()->session()->get('booking_data');
        $sessionData['car'] = $hashid;

        request()->session()->put('booking_data', $sessionData);

        return redirect()->route('insurances', $hashid);
    }

    protected function carSearch()
    {
        //$sessionData = request()->session()->get('booking_data');

        $this->carsSearch->setData(
            [
                'types' => $this->categories,
                'specs' => $this->selectables,
                'dates' => $this->dates, //['from' => $sessionData['from'], 'to' => $sessionData['to']],
                'locations' => $this->locations,// ['pickup' => $sessionData['pickup'], 'dropoff' => $sessionData['dropoff']]
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

    public function render()
    {
        return view('livewire.web.car-search-results');
    }
}
