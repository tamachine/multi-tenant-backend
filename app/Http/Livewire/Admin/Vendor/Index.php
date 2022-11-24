<?php

namespace App\Http\Livewire\Admin\Vendor;

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
        $vendors = Vendor::livewireSearch($this->search)
            ->orderBy('name')
            ->paginate(perPage());

        return view('livewire.admin.vendor.index', ['vendors' => $vendors]);
    }
}
