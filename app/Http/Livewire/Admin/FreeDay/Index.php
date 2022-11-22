<?php

namespace App\Http\Livewire\Admin\FreeDay;

use App\Models\FreeDay;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $search;

    /**
     * @var array
     */
    public $days = [];

     /**
     * @var bool
     */
    public $test = false;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    protected $updatesQueryString = [
        'search',
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->fill(request()->only('search', 'page'));
    }

    public function editDay($key, FreeDay $freeDay)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'days.*.name'          => ['required'],
            'days.*.min_days'      => ['required', 'numeric', 'gte:1'],
            'days.*.max_days'      => ['required', 'numeric', 'gt:days.*.min_days'],
            'days.*.days_for_free' => ['required', 'numeric', 'gte:1'],
        ]);

        $day = $this->days[$key];

        $freeDay->where('hashid', $day['hashid'])->update([
            'name'          => $day["name"],
            'min_days'      => $day["min_days"],
            'max_days'      => $day["max_days"],
            'days_for_free' => $day["days_for_free"],
        ]);

        $this->dispatchBrowserEvent('open-success', ['message' => 'Edited free day plan ' . $day["name"]]);
    }

    public function deleteFreeDay($hashid, FreeDay $freeDay)
    {
        $freeDay->whereHashid($hashid)->delete();

        $this->dispatchBrowserEvent('open-success', ['message' => 'Free day plan deleted successfully']);
    }

    public function render()
    {
        // Little trick for testing purposes
        if (count($this->days) == 1 && isset($this->days[0]["test"])) {
            $this->test = true;
        }

        if (!$this->test) {
            $this->days = FreeDay::livewireSearch($this->search)
                ->orderBy('min_days', 'asc')
                ->get()
                ->toArray();
        }

        return view('livewire.admin.free-day.index');
    }
}
