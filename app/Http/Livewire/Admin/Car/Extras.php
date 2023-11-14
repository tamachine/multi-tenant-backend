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
        $extras = $extra->where('vendor_id', $car->vendor_id)->orderBy('order_appearance')->get();
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

        //Load the available plans for caren cars
        if(!is_null($this->car->caren_id)){
            $this->getAvailableCarenExtras($carenExtras,$currentExtras);
        }
         //Load the available plans for other cars
        else{
            $this->getAvailableExtras($extras,$currentExtras);
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

    private function getAvailableCarenExtras($carenExtras, $currentExtras):void{

        foreach ( $carenExtras as $carenExtra) {
            if (!is_null($carenExtra->extra) && !in_array($carenExtra->extra_id, $currentExtras)) {
                $this->addAvailableExtra($carenExtra->extra->hashid, $carenExtra->extra->name, false, $carenExtra->is_insurance ? $carenExtra->insurance->color : '');
            }
        }
    }

    private function getAvailableExtras($extras, $currentExtras):void{

        foreach ($extras as $extra) {
            if (!in_array($extra->id, $currentExtras)) {
                $this->addAvailableExtra($extra->hashid, $extra->name, false, $extra->is_insurance ? $extra->insurance->color : '');
            }
        }
    }

    private function addAvailableExtra(string $id, string $name, bool $selected, string $color): void
    {
        $this->availableExtras[] = [
            'id' => $id,
            'name' => $name,
            'selected' => $selected,
            'color' => $color,
        ];
    }

    public function render()
    {
        return view('livewire.admin.car.extras');
    }
}
