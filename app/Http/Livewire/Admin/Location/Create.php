<?php

namespace App\Http\Livewire\Admin\Location;

use App\Models\CarenLocation;
use App\Models\Location;
use Livewire\Component;

class Create extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $caren_locations = [];

     /**
     * @var string
     */
    public $caren_location;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount($caren_location)
    {
        if (config('settings.booking_enabled.caren')) {
            $this->caren_location = $caren_location;
            $this->caren_locations = CarenLocation::whereNull('location_id')->pluck('name', 'id');

            if (!config('settings.booking_enabled.own') && count($this->caren_locations) == 0) {
                session()->flash('status', 'error');
                session()->flash('message', 'No more locations can be created for the moment');

                return redirect()->route('location.index');
            }
        }
    }

    public function saveLocation(Location $location)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name' => ['required'],
        ];

        if (config('settings.booking_enabled.caren') && !config('settings.booking_enabled.own')) {
            $rules = array_merge($rules, ['caren_location' => ['required']]);
        }

        $this->validate($rules);

        $location = $location->create([
            'name' => $this->name,
        ]);

        if (!empty($this->caren_location)) {
            $carenLocation = CarenLocation::find($this->caren_location);
            $carenLocation->update(['location_id' => $location->id]);

            $location->update([
                'caren_settings' => [
                    'caren_pickup_location_id'  => $carenLocation->caren_pickup_location_id,
                    'caren_dropoff_location_id' => $carenLocation->caren_dropoff_location_id,
                ]
            ]);
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Location "' . $this->name .'" created');

        return redirect()->route('location.edit', $location->hashid);
    }

    public function render()
    {
        return view('livewire.admin.location.create');
    }
}
