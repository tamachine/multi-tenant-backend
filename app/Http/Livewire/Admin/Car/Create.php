<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use App\Models\CarenCar;
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

    /**
     * @var string
     */
    public $caren_car;

    /**
     * @var array
     */
    public $caren_cars;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Vendor $vendor, CarenCar $carenCar)
    {
        $this->vendors = $vendor->pluck('name', 'hashid');

        if (config('settings.booking_enabled.caren')) {
            $this->caren_cars = $carenCar->whereNull('car_id')->pluck('name', 'id');

            if (!config('settings.booking_enabled.own') && count($this->caren_cars) == 0) {
                session()->flash('status', 'error');
                session()->flash('message', 'No more cars can be created for the moment');

                return redirect()->route('car.index');
            }
        }
    }

    public function saveCar(Car $car)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name' => ['required'],
            'vendor' => ['required'],
        ];

        if (config('settings.booking_enabled.caren') && !config('settings.booking_enabled.own')) {
            $rules = array_merge($rules, ['caren_car' => ['required']]);
        }

        $this->validate($rules);

        $car = $car->create([
            'name' => $this->name,
            'vendor_id' => dehash($this->vendor),
        ]);

        if (!empty($this->caren_car)) {
            $carenCar = CarenCar::find($this->caren_car);
            $carenCar->update(['car_id' => $car->id]);

            $car->updateFromCarenCar($carenCar->caren_data);
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Car "' . $this->name . '" created');

        return redirect()->route('car.edit', $car->hashid);
    }

    public function render()
    {
        return view('livewire.admin.car.create');
    }
}
