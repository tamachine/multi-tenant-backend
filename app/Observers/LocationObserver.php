<?php

namespace App\Observers;

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
     * Reorder the elements
     *
     * @param  \App\Models\Location  $location
     * @return void
     */
    public function deleted(Location $location)
    {
        $order = 1;

        foreach (Location::orderBy('order_appearance')->get() as $location) {
            $location->update(['order_appearance' => $order]);
            $order++;
        }
    }
}
