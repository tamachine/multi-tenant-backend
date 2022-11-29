<?php

namespace App\Http\Livewire\Admin\Caren;

use App\Models\CarenLocation;
use Livewire\Component;
use Livewire\WithPagination;

class Locations extends Component
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

    public function render()
    {
        $locations = CarenLocation::livewireSearch($this->search)
            ->orderBy('name')
            ->paginate(perPage());

        return view('livewire.admin.caren.locations', ['locations' => $locations]);
    }
}
