<?php

namespace App\Http\Livewire\Admin\Season;

use App\Models\Season;
use App\Models\Vendor;
use Carbon\Carbon;
use Livewire\Component;

class Edit extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Season
     */
    public $season;

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

    public function mount(Season $season, Vendor $vendor)
    {
        $this->season = $season;
        $this->vendors = $vendor->pluck('name', 'hashid');

        $this->name = $this->season->name;
        $this->vendor = $this->season->vendor->hashid;
        $this->min_days_season = $this->season->min_days_season;
        $this->start_date = $this->season->start_date->format('d-m-Y');
        $this->end_date = $this->season->end_date->format('d-m-Y');
        $this->season_discount = $this->season->season_discount;
    }

    public function saveSeason()
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

        $this->season->update([
            'name'              => $this->name,
            'vendor_id'         => dehash($this->vendor),
            'min_days_season'   => $this->min_days_season,
            'start_date'        => Carbon::createFromFormat("d-m-Y", $this->start_date),
            'end_date'          => Carbon::createFromFormat("d-m-Y", $this->end_date),
            'season_discount'   => $this->season_discount,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Season "' . $this->name . '" edited');

        return redirect()->route('season.index');
    }

    public function render()
    {
        return view('livewire.admin.season.edit');
    }
}
