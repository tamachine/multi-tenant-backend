<?php

namespace App\Observers;

use App\Models\CarenVendor;
use App\Models\Vendor;

class VendorObserver
{
    /**
     * Handle the Vendor "deleted" event.
     * Remove the Caren Vendor linked to it
     *
     * @param  \App\Models\Vendor  $vendor
     * @return void
     */
    public function deleted(Vendor $vendor)
    {
        CarenVendor::where('vendor_id', $vendor->id)->update(['vendor_id' => null]);
    }
}
