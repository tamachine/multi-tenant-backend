<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Livewire\Component;

class Create extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $vendor_code;

    /**
     * @var int
     */
    public $service_fee;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $brand_color;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */
    public function mount()
    {
        $this->service_fee = 0;
        $this->status = "active";
        $this->brand_color = "#ffffff";
    }

    public function saveVendor(Vendor $vendor)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'name' => ['required', 'unique:vendors,name'],
            'vendor_code' => ['required', 'unique:vendors,vendor_code'],
            'service_fee' => ['required', 'numeric', 'gte:0'],
            'status' => ['required', 'in:active,hidden'],
            'brand_color' => ['required'],
        ]);

        $vendor = $vendor->create([
            'name' => $this->name,
            'vendor_code' => $this->vendor_code,
            'service_fee' => $this->service_fee,
            'status' => $this->status,
            'brand_color' => $this->brand_color,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Vendor created successfully');

        return redirect()->route('vendor.edit', $vendor->hashid);
    }

    public function render()
    {
        return view('livewire.admin.vendor.create');
    }
}
