<?php

namespace App\Http\Livewire\Admin\Extra;

use App\Models\Extra;
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
     * @var int
     */
    public $count;

    /**
     * @var string
     */
    public $vendor = '';

    /**
     * @var array
     */
    public $vendors;

    /**
     * @var bool
     */
    public $oneVendor = false;

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
        $this->vendors = $vendor->orderBy('name')->pluck('name', 'hashid');
        $this->fill(request()->only('search', 'page'));

        if (count($this->vendors) == 1) {
            $this->vendor = $this->vendors->keys()->first();
            $this->oneVendor = true;
        }
    }

    public function moveExtra($hashid, $up)
    {
        $extra = Extra::where('hashid', $hashid)->first();

        if ($up) {
            $swapExtra = Extra::where('vendor_id', $extra->vendor_id)->where('order_appearance', $extra->order_appearance - 1)->first();
            $extra->update(['order_appearance' => $extra->order_appearance - 1]);
            $swapExtra->update(['order_appearance' => $swapExtra->order_appearance + 1]);
        } else {
            $swapExtra = Extra::where('vendor_id', $extra->vendor_id)->where('order_appearance', $extra->order_appearance + 1)->first();
            $extra->update(['order_appearance' => $extra->order_appearance + 1]);
            $swapExtra->update(['order_appearance' => $swapExtra->order_appearance - 1]);
        }
    }

    public function render()
    {
        $extras = Extra::join('vendors', 'extras.vendor_id', '=', 'vendors.id')
            ->livewireSearch($this->vendor, $this->search)
            ->select('extras.hashid', 'extras.name', 'extras.active', 'extras.caren_id', 'vendors.name as vendor_name', 'vendors.brand_color')
            ->orderBy('vendor_name', 'asc')
            ->orderBy('extras.order_appearance', 'asc')
            ->get();

        $this->count = $extras->count();

        return view('livewire.admin.extra.index', ['extras' => $extras]);
    }
}
