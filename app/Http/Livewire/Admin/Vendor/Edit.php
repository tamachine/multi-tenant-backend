<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Livewire\Component;

class Edit extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Vendor
     */
    public $vendor;

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
    public function mount($vendor, Vendor $vendorModel)
    {
        $this->vendor = $vendorModel->where('hashid', $vendor)->firstOrFail();

        $this->name = $this->vendor->name;
        $this->vendor_code = $this->vendor->vendor_code;
        $this->service_fee = $this->vendor->service_fee;
        $this->status = $this->vendor->status;
        $this->brand_color = $this->vendor->brand_color;
    }

    public function saveVendor()
    {
        $this->validate([
            'name' => ['required', 'unique:vendors,name,' . $this->vendor->id],
            'vendor_code' => ['required', 'unique:vendors,vendor_code,' . $this->vendor->id],
            'service_fee' => ['required', 'numeric', 'gte:0'],
            'status' => ['required', 'in:active,hidden'],
            'brand_color' => ['required'],
        ]);

        $this->vendor->update([
            'name' => $this->name,
            'vendor_code' => $this->vendor_code,
            'service_fee' => $this->service_fee,
            'status' => $this->status,
            'brand_color' => $this->brand_color,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Vendor edited successfully');

        return redirect()->route('vendor.index');
    }

    public function deleteVendor($hashid)
    {
        $this->vendor->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The vendor has been deleted successfully'));

        return redirect()->route('vendor.index');
    }

    public function render()
    {
        return view('livewire.admin.vendor.edit');
    }
}
