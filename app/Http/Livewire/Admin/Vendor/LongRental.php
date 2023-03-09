<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Livewire\Component;

class LongRental extends Component
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
     * @var array
     */
    public $long_rental = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Vendor $vendor)
    {
        $this->vendor = $vendor;
        $this->long_rental = $this->vendor->long_rental;

        if (is_null($this->long_rental)) {
            $this->long_rental = [];

            for($i = 1; $i <= 20; $i++) {
                $this->long_rental[$i] = 0;
            }
        }
    }

    public function saveLongRental()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate(
            [
                'long_rental.*' => ['required', 'numeric', 'gte:0', 'lt:100'],
            ],
            [
                'long_rental.*.required' => 'Discount is required',
                'long_rental.*.gte' => 'Discount must be a positive value',
                'long_rental.*.lt' => 'Discount must less than 100%!',
            ]
        );

        $this->vendor->update([
            'long_rental' => $this->long_rental
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Long Rental settings updated for ' . $this->vendor->name);

        return redirect()->route('intranet.vendor.edit', ["vendor" => $this->vendor->hashid, "tab" => "long"]);
    }

    public function render()
    {
        return view('livewire.admin.vendor.long-rental');
    }
}
