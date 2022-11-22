<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use Carbon\Carbon;
use Livewire\Component;

class Unavailability extends Component
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
    public $dates = [];

     /**
     * @var object
     */
    public $start_date;

     /**
     * @var object
     */
    public $end_date;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Car $car)
    {
        $this->car = $car;

        // Load the unavaliable dates
        foreach ($car->unavailable_dates as $date) {
            $this->dates[] = [
                'id'            => $date->id,
                'start_date'    => $date->start_date->format('d-m-Y'),
                'end_date'      => $date->end_date->format('d-m-Y'),
            ];
        }
    }

    public function addDate()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);

        $this->car->unavailable_dates()->create([
            'start_date'    => Carbon::createFromFormat("d-m-Y", $this->start_date),
            'end_date'      => Carbon::createFromFormat("d-m-Y", $this->end_date),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Added unavailable dates for ' . $this->car->name);

        return redirect()->route('car.edit', ["car" => $this->car->hashid, "tab" => "unavailability"]);
    }

    public function editDate($key)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate(
            [
                'dates.*.start_date' => ['required', 'date'],
                'dates.*.end_date' => ['required', 'date', 'after:dates.*.start_date'],
            ]
        );

        $date = $this->dates[$key];

        $this->car->unavailable_dates()->where('id', $date['id'])->update([
            'start_date'    => Carbon::createFromFormat("d-m-Y", $date["start_date"]),
            'end_date'      => Carbon::createFromFormat("d-m-Y", $date["end_date"]),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Edited unavailable dates for ' . $this->car->name);

        return redirect()->route('car.edit', ["car" => $this->car->hashid, "tab" => "unavailability"]);
    }

    public function deleteDate($key)
    {
        $date = $this->dates[$key];

        $this->car->unavailable_dates()->where('id', $date['id'])->delete();

        session()->flash('status', 'success');
        session()->flash('message', 'Deleted unavailable dates for ' . $this->car->name);

        return redirect()->route('car.edit', ["car" => $this->car->hashid, "tab" => "unavailability"]);
    }

    public function render()
    {
        return view('livewire.admin.car.unavailability');
    }
}
