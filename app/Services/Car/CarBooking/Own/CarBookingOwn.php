<?php 

namespace App\Services\Car\CarBooking\Caren;

use App\Models\Booking;
use App\Models\Car;
use App\Services\Car\CarBooking\CarBookingInterface;

class CarBookingOwn implements CarBookingInterface{

    public function setCar(Car $car) {

    }

    public function setParams(array $params) {

    }

    public function validateData(): bool {
        return true;
    }
    
    public function errors(): array {
        return [];
    }

    public function create(): Booking|false {
        return false;
    }
}