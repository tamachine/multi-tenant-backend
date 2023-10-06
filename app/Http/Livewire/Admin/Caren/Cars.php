<?php

namespace App\Http\Livewire\Admin\Caren;

use App\Models\CarenCar;
use Livewire\Component;
use Livewire\WithPagination;

class Cars extends Component
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
        $cars = CarenCar::with('car')
            ->livewireSearch($this->search)
            ->orderBy('name')
            ->paginate(perPage());

        return view('livewire.admin.caren.cars', ['cars' => $cars]);
    }
}
