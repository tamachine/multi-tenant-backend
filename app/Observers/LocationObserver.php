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
}
