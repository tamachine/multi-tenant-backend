<?php

namespace App\Http\Livewire\Admin\Season;

use App\Models\Season;
use App\Models\Vendor;
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
     * @var int
     */
    public $count;

    /**
     * @var string
     */
    public $vendor = '';

    /**
     * @var array
     */
    public $vendors;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    protected $updatesQueryString = [
        'search',
        'page' => ['except' => 1],
    ];

    public function mount(Vendor $vendor)
    {
        $this->vendors = $vendor->pluck('name', 'hashid');
        $this->fill(request()->only('search', 'page'));
    }

    public function duplicate($hashid, Season $season)
    {
        $origin = $season->whereHashid($hashid)->firstOrFail();

        $season->create([
            'name'              => $origin->name . " DUPLICATED",
            'vendor_id'         => $origin->vendor_id,
            'min_days_season'   => $origin->min_days_season,
            'start_date'        => $origin->start_date->addYear(),
            'end_date'          => $origin->end_date->addYear(),
            'season_discount'   => $origin->season_discount,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', __('The season "' . $origin->name . '" has been duplicated'));

        return redirect()->route('season.index');
    }

    public function deleteSeason($hashid, Season $season)
    {
        $season->whereHashid($hashid)->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The season has been deleted'));

        return redirect()->route('season.index');
    }

    public function render()
    {
        $seasons = Season::join('vendors', 'seasons.vendor_id', '=', 'vendors.id')
            ->livewireSearch($this->vendor, $this->search)
            ->select('seasons.hashid', 'seasons.name', 'seasons.start_date', 'seasons.end_date', 'vendors.name as vendor_name', 'vendors.brand_color')
            ->orderBy('vendor_id', 'asc')
            ->orderBy('start_date', 'desc')
            ->paginate(perPage());

        $this->count = $seasons->count();

        return view('livewire.admin.season.index', ['seasons' => $seasons]);
    }
}
