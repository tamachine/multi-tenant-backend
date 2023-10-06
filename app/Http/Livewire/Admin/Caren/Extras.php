<?php

namespace App\Http\Livewire\Admin\Caren;

use App\Models\CarenExtra;
use Livewire\Component;
use Livewire\WithPagination;

class Extras extends Component
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
        $extras = CarenExtra::with('extra')
            ->livewireSearch($this->search)
            ->orderBy('name')
            ->paginate(perPage());

        return view('livewire.admin.caren.extras', ['extras' => $extras]);
    }
}
