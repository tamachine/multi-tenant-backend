<?php

/*
    This settings will be moved to the landlord-tenants system some time in the future
*/

return [
    'default_currency' => 'USD',

    'booking_enabled' => [
        'own' => false,
        'caren' => true
    ],

    'car' => [
        'seasons' => false,
    ],

    'vendor' => [
        'multivendor' => false,
    ],

    'slack' => [
        'enabled' => env('SLACK_ENABLED', false),
    ],

    'email' => [
        'contact'       => env('MAIL_FROM_ADDRESS'),
        'newsletter'    => env('MAIL_FROM_ADDRESS'),
    ]
];
