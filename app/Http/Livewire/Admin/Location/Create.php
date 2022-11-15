<?php

namespace App\Http\Livewire\Admin\Location;

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
     * @var bool
     */
    public $pickup_show_input = false;

    /**
     * @var bool
     */
    public $pickup_input_require = false;

    /**
     * @var string
     */
    public $pickup_input_info;

     /**
     * @var bool
     */
    public $dropoff_show_input = false;

    /**
     * @var bool
     */
    public $dropoff_input_require = false;

     /**
     * @var string
     */
    public $dropoff_input_info;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */
    public function mount()
    {
        //
    }

    public function saveLocation(Location $location)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'name' => ['required', 'unique:locations,name'],
        ]);

        $location = $location->create([
            'name' => $this->name,
            'pickup_show_input' => $this->pickup_show_input,
            'pickup_input_require' => $this->pickup_input_require,
            'pickup_input_info' => $this->pickup_input_info,
            'dropoff_show_input' => $this->dropoff_show_input,
            'dropoff_input_require' => $this->dropoff_input_require,
            'dropoff_input_info' => $this->dropoff_input_info,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Location created successfully');

        return redirect()->route('location.edit', $location->hashid);
    }

    public function render()
    {
        return view('livewire.admin.location.create');
    }
}
