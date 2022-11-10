<?php

return [
    /*
     * In order to provide unique Hashids for each model, we are passing an
     * additional id to the hashing method When we dehash, we ignore this second
     * number and return the id of the record
     */
    'App\Models\Voucher' => 1,
];
