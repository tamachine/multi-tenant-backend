<?php

namespace App\Observers;

use App\Models\CarenLocation;
use App\Models\Location;

class LocationObserver
{
    /**
     * Handle the Location "created" event.
     * Add the order number
     *
     * @param  \App\Models\Location  $location
     * @return void
     */
    public function created(Location $location)
    {
        $location->order_appearance = Location::count();
        $location->save();
    }

    /**
     * Handle the Location "deleted" event.
     * 1. Remove the Caren Location linked to it
     * 2. Reorder the elements
     *
     * @param  \App\Models\Location  $location
     * @return void
     */
    public function deleted(Location $location)
    {
        CarenLocation::where('location_id', $location->id)->update(['location_id' => null]);

        $order = 1;

        foreach (Location::orderBy('order_appearance')->get() as $location) {
            $location->update(['order_appearance' => $order]);
            $order++;
        }
    }
}
