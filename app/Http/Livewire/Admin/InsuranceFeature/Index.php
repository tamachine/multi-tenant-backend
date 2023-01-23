<?php

namespace App\Http\Livewire\Admin\InsuranceFeature;

use App\Models\InsuranceFeature;
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


    public function render()
    {
        $insuranceFeatures = InsuranceFeature::livewireSearch($this->search)            
            ->paginate(perPage());

        $this->count = $insuranceFeatures->count();

        return view('livewire.admin.insurance-feature.index', ['insurance_features' => $insuranceFeatures]);
    }
}
