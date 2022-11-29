<?php

namespace App\Http\Livewire\Admin\FreeDay;

use App\Models\FreeDay;
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
     * @var int
     */
    public $min_days;

    /**
     * @var int
     */
    public $max_days;

    /**
     * @var int
     */
    public $days_for_free;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function saveFreeDay(FreeDay $freeDay)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'name'          => ['required'],
            'min_days'      => ['required', 'numeric', 'gte:1'],
            'max_days'      => ['required', 'numeric', 'gt:min_days'],
            'days_for_free' => ['required', 'numeric', 'gte:1'],
        ]);

        $freeDay = $freeDay->create([
            'name'          => $this->name,
            'min_days'      => $this->min_days,
            'max_days'      => $this->max_days,
            'days_for_free' => $this->days_for_free,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Free day plan "' . $this->name . '" created');

        return redirect()->route('free-day.index');
    }

    public function render()
    {
        return view('livewire.admin.free-day.create');
    }
}
