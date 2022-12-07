<?php

return [
    /*
     * In order to provide unique Hashids for each model, we are passing an
     * additional id to the hashing method When we dehash, we ignore this second
     * number and return the id of the record
     */

    'App\Models\User' => 1,
    'App\Models\Vendor' => 2,
    'App\Models\Location' => 3,
    'App\Models\Car' => 4,
    'App\Models\CarImage' => 5,
    'App\Models\Season' => 6,
    'App\Models\FreeDay' => 7,
    'App\Models\Extra' => 8,
    'App\Models\Affiliate' => 9,
    'App\Models\Booking' => 10,
];
