<?php

return [
    /*
     * In order to provide unique Hashids for each model, we are passing an
     * additional id to the hashing method When we dehash, we ignore this second
     * number and return the id of the record
     */

    'App\Models\Voucher' => 1,
    'App\Models\Location' => 2,
    'App\Models\Car' => 3,
    'App\Models\CarImage' => 4,
    'App\Models\Season' => 5,
    'App\Models\FreeDay' => 6,
    'App\Models\Extra' => 7,
];
