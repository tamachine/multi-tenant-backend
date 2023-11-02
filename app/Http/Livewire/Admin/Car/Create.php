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

    public function mount($caren_car)
    {
        $this->vendors = Vendor::pluck('name', 'hashid');

        if (config('settings.booking_enabled.caren')) {
            $this->caren_cars = CarenCar::whereNull('car_id')->pluck('name', 'id');
            $this->caren_car = $caren_car;

            if (!config('settings.booking_enabled.own') && count($this->caren_cars) == 0) {
                session()->flash('status', 'error');
                session()->flash('message', 'No more cars can be created for the moment');

                return redirect()->route('intranet.car.index');
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

            // Update some information from the Caren car and its extras
            $car->updateFromCarenCar($carenCar->caren_data);
            foreach($carenCar->carenExtras as $carenExtra) {
                $car->extras()->attach($carenExtra->extra_id);
            }
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Car "' . $this->name . '" created');

        return redirect()->route('intranet.car.edit', $car->hashid);
    }

    public function render()
    {
        return view('livewire.admin.car.create');
    }
}
