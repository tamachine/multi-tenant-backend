<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::group(
    [
        'namespace' => 'Admin'
    ],
    function () {
        // Dashboard
        Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

        // Locations
        Route::group(['prefix' => 'location', 'as' => 'location.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'LocationController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'LocationController@create']);
            Route::get('{location}/edit', ['as' => 'edit', 'uses' => 'LocationController@edit']);
        });

        // Vendors
        Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'VendorController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'VendorController@create']);
            Route::get('{vendor}/edit/{tab?}', ['as' => 'edit', 'uses' => 'VendorController@edit']);
        });
    }
);
