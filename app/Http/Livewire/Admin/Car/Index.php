<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
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
     * @var string
     */
    public $status = "";

    /**
     * @var string
     */
    public $order = "vendor";

    /**
     * @var string
     */
    public $vendor = '';

    /**
     * @var array
     */
    public $vendors;

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



    public function mount(Vendor $vendor)
    {
        $this->vendors = $vendor->pluck('name', 'hashid');
        $this->fill(request()->only('search', 'page'));
    }

    public function render()
    {
        $order = $this->order == "vendor"
            ? 'vendors.id'
            : 'cars.fleet_position';

        $cars = Car::join('vendors', 'cars.vendor_id', '=', 'vendors.id')
            ->livewireSearch($this->status, $this->vendor, $this->search)
            ->select('cars.hashid', 'cars.name', 'cars.active', 'cars.fleet_position', 'vendors.name as vendor_name', 'vendors.brand_color')
            ->orderBy($order)
            ->paginate(perPage());

        return view('livewire.admin.car.index', ['cars' => $cars]);
    }
}
