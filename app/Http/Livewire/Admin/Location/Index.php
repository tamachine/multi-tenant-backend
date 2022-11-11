<?php

namespace App\Http\Livewire\Admin\Location;

use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
     * @var string
     */
    public $search;

    protected $updatesQueryString = [
        'search',
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->fill(request()->only('search', 'page'));
    }

    public function changeOrder($locationId, $order) {
        $location = Location::find($locationId);
        $location->update(['order_appearance' => $order]);
        $this->render();
    }

    public function render()
    {
        $locations = Location::livewireSearch($this->search)
            ->orderBy('order_appearance')
            ->paginate(perPage());

        return view('livewire.admin.location.index', ['locations' => $locations]);
    }
}
