<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use App\Models\Vendor;
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
     * @var string
     */
    public $vendor;

    /**
     * @var array
     */
    public $vendors;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */
    public function mount(Vendor $vendor)
    {
        $this->vendors = $vendor->pluck('name', 'hashid');
    }

    public function saveCar(Car $car)
    {
        $this->validate([
            'name' => ['required'],
            'vendor' => ['required'],
        ]);

        $car = $car->create([
            'name' => $this->name,
            'vendor_id' => dehash($this->vendor),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Car created successfully');

        return redirect()->route('car.edit', $car->hashid);
    }

    public function render()
    {
        return view('livewire.admin.car.create');
    }
}
