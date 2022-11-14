<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Location;
use App\Models\Vendor;
use App\Models\VendorLocation;
use Livewire\Component;

class Locations extends Component
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
    public $lines = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */
    public function mount($vendor, Vendor $vendorModel, Location $location)
    {
        $this->vendor = $vendorModel->where('hashid', $vendor)->firstOrFail();
        $vendorLocations = $this->vendor->vendorLocations;

        $locations = Location::orderBy('name')->get();

        // Load the locations
        foreach ($locations as $location) {
            $vendorLocation = $vendorLocations->where('location_id', $location->id)->first();

            $this->lines[] = [
                'id'        => $location->id,
                'name'      => $location->name,
                'available' => $vendorLocation ? true : false,
                'price'     => $vendorLocation ? $vendorLocation->price : 0,
            ];
        }
    }

    public function saveLocations()
    {
        $this->validate(
            [
                'lines.*.price' => ['required', 'numeric', 'gte:0'],
            ],
            [
                'lines.*.price.gte' => 'Price must be a positive value',
            ]
        );

        foreach($this->lines as $line) {
            if ($line['available']) {
                VendorLocation::updateOrCreate(
                    [
                        'vendor_id' => $this->vendor->id,
                        'location_id' => $line['id'],
                    ],
                    [
                        'price' => $line['price']
                    ]
                );
            } else {
                VendorLocation::where('vendor_id', $this->vendor->id)->where('location_id', $line['id'])->delete();
            }
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Locations updated for ' . $this->vendor->name);

        return redirect()->route('vendor.edit', ["vendor" => $this->vendor->hashid, "tab" => "tab2"]);
    }

    public function render()
    {
        return view('livewire.admin.vendor.locations');
    }
}
