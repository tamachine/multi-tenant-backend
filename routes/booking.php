<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Booking Routes
|--------------------------------------------------------------------------
|
*/

Route::group(
    [
        'namespace' => 'Booking'
    ],
    function () {
        // Booking main routes
        Route::get('/', ['as' => 'dashboard', 'uses' => 'BookingController@dashboard']);
        Route::get('history', ['as' => 'history', 'uses' => 'BookingController@history']);
        Route::get('create', ['as' => 'create', 'uses' => 'BookingController@create']);
    }
);
