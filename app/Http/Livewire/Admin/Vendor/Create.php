<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\CarenVendor;
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
     * @var bool
     */
    public $edit = false;

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
    public $service_fee = 0;

    /**
     * @var string
     */
    public $status = "active";

    /**
     * @var string
     */
    public $brand_color = "#ffffff";

    /**
     * @var string
     */
    public $caren_vendor = "";

    /**
     * @var array
     */
    public $caren_vendors = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(CarenVendor $carenVendor)
    {
        if (config('settings.booking_enabled.caren')) {
            $this->caren_vendors = $carenVendor->whereNull('vendor_id')->pluck('name', 'id');

            if (!config('settings.booking_enabled.own') && count($this->caren_vendors) == 0) {
                session()->flash('status', 'error');
                session()->flash('message', 'No more vendors can be created for the moment');

                return redirect()->route('vendor.index');
            }
        }
    }

    public function saveVendor(Vendor $vendor)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name' => ['required', 'unique:vendors,name'],
            'vendor_code' => ['required', 'unique:vendors,vendor_code'],
            'service_fee' => ['required', 'numeric', 'gte:0'],
            'status' => ['required', 'in:active,hidden'],
            'brand_color' => ['required'],
        ];

        if (config('settings.booking_enabled.caren') && !config('settings.booking_enabled.own')) {
            $rules = array_merge($rules, ['caren_vendor' => ['required']]);
        }

        $this->validate($rules);

        $vendor = $vendor->create([
            'name' => $this->name,
            'vendor_code' => $this->vendor_code,
            'service_fee' => $this->service_fee,
            'status' => $this->status,
            'brand_color' => $this->brand_color,
        ]);

        if (!empty($this->caren_vendor)) {
            $carenVendor = CarenVendor::find($this->caren_vendor);
            $carenVendor->update(['vendor_id' => $vendor->id]);

            $vendor->update([
                'caren_settings' => [
                    array_merge(config('caren.vendor_settings'), ['rental_id' => $carenVendor->caren_rental_id])
                ]
            ]);
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Vendor "' . $this->name . '" created');

        return redirect()->route('vendor.edit', $vendor->hashid);
    }

    public function render()
    {
        return view('livewire.admin.vendor.create');
    }
}
