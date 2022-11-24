<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use Livewire\Component;

class Edit extends Component
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
     * @var string
     */
    public $vendor;

    /**
     * @var int
     */
    public $online_percentage;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var bool
     */
    public $active;

    /**
     * @var string
     */
    public $car_code;

    /**
     * @var int
     */
    public $year;

    /**
     * @var int
     */
    public $fleet_position;

    /**
     * @var int
     */
    public $ranking;

    /**
     * @var int
     */
    public $users_number_votes;

    /**
     * @var int
     */
    public $min_days_booking;

    /**
     * @var int
     */
    public $min_preparation_time;

    /**
     * @var int
     */
    public $adult_passengers;

    /**
     * @var int
     */
    public $doors;

    /**
     * @var int
     */
    public $luggage;

    /**
     * @var int
     */
    public $units;

    /**
     * @var string
     */
    public $engine;

    /**
     * @var string
     */
    public $transmission;

    /**
     * @var string
     */
    public $vehicle_type;

    /**
     * @var string
     */
    public $vehicle_brand;

    /**
     * @var string
     */
    public $f_roads_name;

    /**
     * @var string
     */
    public $vehicle_class;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Car $car)
    {
        $this->car = $car;

        $this->vendor = $this->car->vendor->name;

        $this->online_percentage = $car->online_percentage;
        $this->name = $this->car->name;
        $this->description = $this->car->description;
        $this->active = $this->car->active;
        $this->car_code = $this->car->car_code;
        $this->year = $this->car->year;

        $this->fleet_position = $this->car->fleet_position;
        $this->ranking = $this->car->ranking;
        $this->users_number_votes = $this->car->users_number_votes;
        $this->min_days_booking = $this->car->min_days_booking;
        $this->min_preparation_time = $this->car->min_preparation_time;
        $this->adult_passengers = $this->car->adult_passengers;
        $this->doors = $this->car->doors;
        $this->luggage = $this->car->luggage;
        $this->units = $this->car->units;

        $this->engine = $this->car->engine;
        $this->transmission = $this->car->transmission;
        $this->vehicle_type = $this->car->vehicle_type;
        $this->vehicle_brand = $this->car->vehicle_brand;
        $this->f_roads_name = $this->car->f_roads_name;
        $this->vehicle_class = $this->car->vehicle_class;
    }

    public function saveCar()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'online_percentage' => ['required', 'numeric', 'gte:1', 'lte:99'],
            'name' => ['required'],
            'car_code' => ['required', 'string', 'max:4'],
            'year' => ['required', 'numeric', 'gte:2000', 'lte:' . now()->year],
        ]);

        $this->car->update([
            'online_percentage' => $this->online_percentage,
            'name' => $this->name,
            'description' => $this->description,
            'active' => $this->active,
            'car_code' => $this->car_code,
            'year' => $this->year,

            'fleet_position' => $this->fleet_position,
            'ranking' => $this->ranking,
            'users_number_votes' => $this->users_number_votes,
            'min_days_booking' => $this->min_days_booking,
            'min_preparation_time' => $this->min_preparation_time,
            'adult_passengers' => $this->adult_passengers,
            'doors' => $this->doors,
            'luggage' => $this->luggage,
            'units' => $this->units,

            'engine' => $this->engine,
            'transmission' => $this->transmission,
            'vehicle_type' => $this->vehicle_type,
            'vehicle_brand' => $this->vehicle_brand,
            'f_roads_name' => $this->f_roads_name,
            'vehicle_class' => $this->vehicle_class,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Car "' . $this->name . '" edited');

        return redirect()->route('car.edit', $this->car->hashid);
    }

    public function deleteCar()
    {
        $this->car->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The car has been deleted'));

        return redirect()->route('car.index');
    }

    public function render()
    {
        return view('livewire.admin.car.edit');
    }
}
