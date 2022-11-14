<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use App\Models\VendorLocationFee;
use Livewire\Component;

class LocationsCombined extends Component
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
    public $locations = [];

     /**
     * @var array
     */
    public $lines = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */
    public function mount($vendor, Vendor $vendorModel)
    {
        $this->vendor = $vendorModel->where('hashid', $vendor)->firstOrFail();
        $vendorLocations = $this->vendor->vendorLocations;
        $vendorFees = $this->vendor->vendorLocationFees;

        foreach ($vendorLocations as $vendorLocationPickup) {
            $this->locations[] = $vendorLocationPickup->location->name;
            $locationFees = [];

            foreach ($vendorLocations as $vendorLocationDropOff) {
                $vendorFee = $vendorFees->where('location_pickup', $vendorLocationPickup->location->id)
                    ->where('location_dropoff', $vendorLocationDropOff->location->id)
                    ->first();

                $locationFees[$vendorLocationDropOff->location->id] =  $vendorFee ? $vendorFee->fee : 0;
            }

            $this->lines[$vendorLocationPickup->location->id] = [
                'name'      => $vendorLocationPickup->location->name,
                'fees'      => $locationFees,
            ];
        }
    }

    public function saveLocations()
    {
        $this->validate(
            [
                'lines.*.fees.*' => ['required', 'numeric', 'gte:0'],
            ],
            [
                'lines.*.fees.*.gte' => 'Fee must be a positive value',
            ]
        );

        foreach($this->lines as $pickupLocationKey => $line) {
            foreach($line['fees'] as $dropoffLocationKey => $dropoffLocationFee) {
                if ($pickupLocationKey != $dropoffLocationKey) {
                    VendorLocationFee::updateOrCreate(
                        [
                            'vendor_id' => $this->vendor->id,
                            'location_pickup' => $pickupLocationKey,
                            'location_dropoff' => $dropoffLocationKey,
                        ],
                        [
                            'fee' => $dropoffLocationFee
                        ]
                    );
                }
            }
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Locations combined updated for ' . $this->vendor->name);

        return redirect()->route('vendor.edit', ["vendor" => $this->vendor->hashid, "tab" => "tab3"]);
    }

    public function render()
    {
        return view('livewire.admin.vendor.locations-combined');
    }
}
