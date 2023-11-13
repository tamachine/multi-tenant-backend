<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use App\Models\CarenExtra;
use App\Models\Extra;
use Livewire\Component;

class Extras extends Component
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
    public $currentExtras = [];

    /**
     * @var array
     */
    public $availableExtras = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Car $car, Extra $extra)
    {
        $this->car = $car;
        $carenExtras = CarenExtra::with('carenCars','extra')->whereHas('carenCars', function ($query) {
            $query->where('caren_id', $this->car->caren_id);
        })->get();
        $currentExtras = [];

        // Load the current extras
        foreach ($car->extras()->orderBy('order_appearance')->get() as $extra) {

            $this->currentExtras[] = [
                'id'    => $extra->hashid,
                'name'  => $extra->name,
                'color' => $extra->load('insurance')->insurance->color ?? '',
            ];

            $currentExtras[] = $extra->id;
        }

        // Load the available plans
         foreach ( $carenExtras as $carenExtra) {
            if (!is_null($carenExtra->extra) && !in_array($carenExtra->extra_id, $currentExtras)) {
                $this->availableExtras[] = [
                    'id'        => $carenExtra->extra->hashid,
                    'name'      => $carenExtra->extra->name,
                    'selected'  => false,
                    'color'     => $carenExtra->is_insurance ? $carenExtra->insurance->color : '',
                ];
            }
        }

    }

    public function addExtras()
    {
        foreach($this->availableExtras as $extra) {
            if ($extra["selected"]) {
                $this->car->extras()->attach(dehash($extra["id"]));
            }
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Extras added to ' . $this->car->name);

        return redirect()->route('intranet.car.edit', ["car" => $this->car->hashid, "tab" => "extras"]);
    }

    public function deleteExtra($id)
    {
        $this->car->extras()->detach(dehash($id));

        session()->flash('status', 'success');
        session()->flash('message', 'Deleted extra from ' . $this->car->name);

        return redirect()->route('intranet.car.edit', ["car" => $this->car->hashid, "tab" => "extras"]);
    }

    public function render()
    {
        return view('livewire.admin.car.extras');
    }
}
