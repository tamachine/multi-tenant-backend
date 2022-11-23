<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use Livewire\Component;

class Locations extends Component
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
    public $currentLocations = [];

    /**
     * @var array
     */
    public $availableLocations = [];

    /**
     * @var string
     */
    public $location = "";

    /**
     * @var string
     */
    public $open_from = '00:00';

    /**
     * @var string
     */
    public $open_to = '23:30';

    /**
     * @var bool
     */
    public $pickup_available = true;

    /**
     * @var bool
     */
    public $dropoff_available = true;

    /**
     * @var array
     */
    public $hours = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Car $car)
    {
        $this->car = $car;
        $locations = $car->assignable_locations;
        $currentLocations = [];

        // Load the current locations
        foreach ($car->carLocations as $carLocation) {
            $this->currentLocations[] = [
                'id'                => $carLocation->id,
                'location'          => $carLocation->location->name,
                'open_from'         => $carLocation->open_from->format('H:i'),
                'open_to'           => $carLocation->open_to->format('H:i'),
                'pickup_available'  => $carLocation->pickup_available,
                'dropoff_available' => $carLocation->dropoff_available,
            ];

            $currentLocations[] = $carLocation->location->id;
        }

        // Load the available locations
        foreach ($locations as $location) {
            if (!in_array($location->id, $currentLocations)) {
                $this->availableLocations[] = [
                    'id'    => $location->hashid,
                    'name'  => $location->name,
                ];
            }
        }

        // Load the hours for the dropdowns
        $this->hours = hours_dropdown();
    }

    public function addLocation()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'location' => ['required'],
        ]);

        $this->car->carLocations()->create([
            'location_id'       => dehash($this->location),
            'open_from'         => $this->open_from,
            'open_to'           => $this->open_to,
            'pickup_available'  => $this->pickup_available,
            'dropoff_available' => $this->dropoff_available,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Location added to ' . $this->car->name);

        return redirect()->route('car.edit', ["car" => $this->car->hashid, "tab" => "locations"]);
    }

    public function editLocation($key)
    {
        $location = $this->currentLocations[$key];

        $this->car->carLocations()->where('id', $location['id'])->update([
            'open_from'         => $location["open_from"],
            'open_to'           => $location["open_to"],
            'pickup_available'  => $location["pickup_available"],
            'dropoff_available' => $location["dropoff_available"],
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Edited location for ' . $this->car->name);

        return redirect()->route('car.edit', ["car" => $this->car->hashid, "tab" => "locations"]);
    }

    public function deleteLocation($id)
    {
        $this->car->carLocations()->where('id', $id)->delete();

        session()->flash('status', 'success');
        session()->flash('message', 'Deleted location for ' . $this->car->name);

        return redirect()->route('car.edit', ["car" => $this->car->hashid, "tab" => "locations"]);
    }

    public function render()
    {
        return view('livewire.admin.car.locations');
    }
}
