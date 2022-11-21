<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use Livewire\Component;

class Seasons extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Car
     */
    public $car;

    /**
     * @var array
     */
    public $currentSeasons = [];

    /**
     * @var array
     */
    public $availableSeasons = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Car $car)
    {
        $this->car = $car;
        //$this->availableSeasons = $car->available_seasons;
    }

    public function render()
    {
        return view('livewire.admin.car.seasons');
    }
}
