<?php

namespace App\Services\Car\CarBooking;

use App\Models\Booking;
use App\Models\Car;

interface CarBookingInterface {
    public function setCar(Car $car);
    public function setParams(array $params);
    public function validateData(): bool;    
    public function create(): Booking|false;    
    public function errors(): array;
}