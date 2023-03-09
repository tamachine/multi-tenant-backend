<?php

namespace App\Http\Livewire\Admin\Location;

use App\Models\Location;
use Livewire\Component;

class Edit extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Location
     */
    public $location;

    /**
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $pickup_show_input;

    /**
     * @var bool
     */
    public $pickup_input_require;

    /**
     * @var string
     */
    public $pickup_input_info;

     /**
     * @var bool
     */
    public $dropoff_show_input;

    /**
     * @var bool
     */
    public $dropoff_input_require;

     /**
     * @var string
     */
    public $dropoff_input_info;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Location $location)
    {
        $this->location = $location;

        $this->name = $this->location->name;
        $this->pickup_show_input = $this->location->pickup_show_input;
        $this->pickup_input_require = $this->location->pickup_input_require;
        $this->pickup_input_info = $this->location->pickup_input_info;
        $this->dropoff_show_input = $this->location->dropoff_show_input;
        $this->dropoff_input_require = $this->location->dropoff_input_require;
        $this->dropoff_input_info = $this->location->dropoff_input_info;
    }

    public function saveLocation()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'name' => ['required', 'unique:locations,name,' . $this->location->id],
        ]);

        $this->location->update([
            'name' => $this->name,
            'pickup_show_input' => $this->pickup_show_input,
            'pickup_input_require' => $this->pickup_input_require,
            'pickup_input_info' => $this->pickup_input_info,
            'dropoff_show_input' => $this->dropoff_show_input,
            'dropoff_input_require' => $this->dropoff_input_require,
            'dropoff_input_info' => $this->dropoff_input_info,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Location "' . $this->name .'" edited');

        return redirect()->route('intranet.location.edit', $this->location->hashid);
    }

    public function deleteLocation()
    {
        $this->location->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The location has been deleted'));

        return redirect()->route('intranet.location.index');
    }

    public function render()
    {
        return view('livewire.admin.location.edit');
    }
}
