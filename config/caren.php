<?php

return [
    'url'       => env('CAREN_URL'),
    'apikey'    => env('CAREN_APIKEY'),
    'username'  => env('CAREN_USERNAME'),
    'password'  => env('CAREN_PASSWORD'),

    'endpoints' => [
        'login'             => 'vehicleapi/user/login',
        'vendor_list'       => 'vehicleapi/rental/list',
        'pickup_locations'  => 'vehicleapi/location/getpickuplist',
        'dropoff_locations' => 'vehicleapi/location/getdropofflist',
        'full_car_list'     => 'vehicleapi/class/getlist',
        'extra_list'        => 'vehicleapi/extra/getlist',
        'insurance_list'    => 'vehicleapi/insurance/getlist',
    ],

    'vendor_settings' => [
        'online_percentage' => 15,
        'caren_payment_option_id' => 598,
        'link_cms_caren' => false
    ]
];
