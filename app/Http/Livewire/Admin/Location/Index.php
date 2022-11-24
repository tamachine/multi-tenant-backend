<?php

namespace App\Http\Livewire\Admin\Location;

use App\Models\Location;
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
     * @var array
     */
    protected $updatesQueryString = [
        'search',
        'page' => ['except' => 1],
    ];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        $this->fill(request()->only('search', 'page'));
    }

    public function moveLocation($locationId, $up)
    {
        $location = Location::find($locationId);

        if ($up) {
            $swapLocation = Location::where('order_appearance', $location->order_appearance - 1)->first();
            $location->update(['order_appearance' => $location->order_appearance - 1]);
            $swapLocation->update(['order_appearance' => $swapLocation->order_appearance + 1]);
        } else {
            $swapLocation = Location::where('order_appearance', $location->order_appearance + 1)->first();
            $location->update(['order_appearance' => $location->order_appearance + 1]);
            $swapLocation->update(['order_appearance' => $swapLocation->order_appearance - 1]);
        }
    }

    public function render()
    {
        $locations = Location::livewireSearch($this->search)
            ->orderBy('order_appearance')
            ->paginate(perPage());

        $this->count = $locations->count();

        return view('livewire.admin.location.index', ['locations' => $locations]);
    }
}
