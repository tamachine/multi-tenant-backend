<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use App\Models\FreeDay;
use Livewire\Component;

class FreeDays extends Component
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
    public $currentPlans = [];

    /**
     * @var array
     */
    public $availablePlans = [];

     /**
     * @var array
     */
    public $plan = '';

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Car $car, FreeDay $freeDay)
    {
        $this->car = $car;
        $freeDays = $freeDay->orderBy('min_days')->get();
        $currentPlans = [];

        // Load the current plans
        foreach ($car->carFreeDays as $plan) {
            $this->currentPlans[] = [
                'id'            => $plan->freeDay->id,
                'name'          => $plan->freeDay->name,
                'min_days'      => $plan->freeDay->min_days,
                'max_days'      => $plan->freeDay->max_days,
                'days_for_free' => $plan->freeDay->days_for_free,
            ];
            $currentPlans[] = $plan->freeDay->id;
        }

        // Order by "Min days"
        usort($this->currentPlans, function ($item1, $item2) {
            return $item1['min_days'] <=> $item2['min_days'];
        });

        // Load the available plans
        foreach ($freeDays as $freeDay) {
            if (!in_array($freeDay->id, $currentPlans)) {
                $this->availablePlans[] = [
                    'id'    => $freeDay->id,
                    'name'  => $freeDay->name,
                ];
            }
        }
    }

    public function addPlan()
    {
        $this->car->carFreeDays()->create([
            'free_day_id' => $this->plan,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Free day plan added for ' . $this->car->name);

        return redirect()->route('intranet.car.edit', ["car" => $this->car->hashid, "tab" => "free-day"]);
    }

    public function addPlans()
    {
        foreach($this->availablePlans as $plan) {
            $this->car->carFreeDays()->create([
                'free_day_id' => $plan["id"],
            ]);
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Free day plans added for ' . $this->car->name);

        return redirect()->route('intranet.car.edit', ["car" => $this->car->hashid, "tab" => "free-day"]);
    }

    public function deletePlan($id)
    {
        $this->car->carFreeDays()->where('free_day_id', $id)->delete();

        session()->flash('status', 'success');
        session()->flash('message', 'Deleted free day plan for ' . $this->car->name);

        return redirect()->route('intranet.car.edit', ["car" => $this->car->hashid, "tab" => "free-day"]);
    }

    public function render()
    {
        return view('livewire.admin.car.free-day-plans');
    }
}
