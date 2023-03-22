<?php

namespace App\Http\Livewire\Admin\Rate;

use App\Models\Rate;
use Livewire\Component;

class Index extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $search;

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
        $rates = Rate::livewireSearch($this->search)
            ->orderBy('code')
            ->get();

        return view('livewire.admin.rate.index', ['rates' => $rates]);
    }
}
