<?php

namespace App\Http\Livewire\Admin\Season;

use App\Models\Season;
use App\Models\Vendor;
use Carbon\Carbon;
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
     * @var int
     */
    public $min_days_season = 1;

    /**
     * @var object
     */
    public $start_date;

     /**
     * @var object
     */
    public $end_date;

    /**
     * @var int
     */
    public $season_discount = 0;

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

    public function saveSeason(Season $season)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'name'              => ['required'],
            'vendor'            => ['required'],
            'min_days_season'   => ['required', 'numeric', 'gte:1', 'lte:50'],
            'start_date'        => ['required'],
            'end_date'          => ['required'],
            'season_discount'   => ['required', 'numeric', 'gte:0', 'lt:100'],
        ]);

        $season = $season->create([
            'name'              => $this->name,
            'vendor_id'         => dehash($this->vendor),
            'min_days_season'   => $this->min_days_season,
            'start_date'        => Carbon::createFromFormat("d-m-Y", $this->start_date),
            'end_date'          => Carbon::createFromFormat("d-m-Y", $this->end_date),
            'season_discount'   => $this->season_discount,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Season created successfully');

        return redirect()->route('season.index');
    }

    public function render()
    {
        return view('livewire.admin.season.create');
    }
}
