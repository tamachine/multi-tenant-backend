<?php

namespace App\Observers;

use App\Models\CarenCar;
use App\Models\Car;

class CarObserver
{
    /**
     * Handle the Car "deleted" event.
     * Remove the Caren Car linked to it
     *
     * @param  \App\Models\Car  $car
     * @return void
     */
    public function deleted(Car $car)
    {
        CarenCar::where('car_id', $car->id)->update(['car_id' => null]);
    }
}
