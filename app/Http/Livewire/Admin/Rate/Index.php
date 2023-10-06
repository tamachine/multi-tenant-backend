<?php

namespace App\Http\Livewire\Admin\Rate;

use App\Models\Currency;
use App\Models\CurrencyRate;
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
        $currencies = Currency::livewireSearch($this->search)
            ->orderBy('code')
            ->with('rate')
            ->get();

        return view('livewire.admin.rate.index', ['currencies' => $currencies]);
    }
}
