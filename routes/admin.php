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

        // Cars
        Route::group(['prefix' => 'car', 'as' => 'car.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'CarController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'CarController@create']);
            Route::get('{car}/edit/{tab?}', ['as' => 'edit', 'uses' => 'CarController@edit']);
        });

        // Free days
        Route::group(['prefix' => 'free-day', 'as' => 'free-day.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'FreeDayController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'FreeDayController@create']);
        });

        // Locations
        Route::group(['prefix' => 'location', 'as' => 'location.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'LocationController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'LocationController@create']);
            Route::get('{location}/edit', ['as' => 'edit', 'uses' => 'LocationController@edit']);
        });

        // Seasons
        Route::group(['prefix' => 'season', 'as' => 'season.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'SeasonController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'SeasonController@create']);
            Route::get('{season}/edit', ['as' => 'edit', 'uses' => 'SeasonController@edit']);
        });

        // Vendors
        Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'VendorController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'VendorController@create']);
            Route::get('{vendor}/edit/{tab?}', ['as' => 'edit', 'uses' => 'VendorController@edit']);
        });
    }
);
