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
        // Dashboards
        Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
        Route::get('settings', ['as' => 'settings', 'uses' => 'DashboardController@settings']);
        
        // Caren
        Route::group(['prefix' => 'caren', 'as' => 'caren.'], function () {
            Route::get('/{tab?}', ['as' => 'index', 'uses' => 'CarenController@index']);
        });

        // Cars
        Route::group(['prefix' => 'car', 'as' => 'car.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'CarController@index']);
            Route::get('create/{caren_car?}', ['as' => 'create', 'uses' => 'CarController@create']);
            Route::get('{car}/edit/{tab?}', ['as' => 'edit', 'uses' => 'CarController@edit']);
        });

        // Extras
        Route::group(['prefix' => 'extra', 'as' => 'extra.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'ExtraController@index']);
            Route::get('create/{caren_extra?}', ['as' => 'create', 'uses' => 'ExtraController@create']);
            Route::get('{extra}/edit/{tab?}', ['as' => 'edit', 'uses' => 'ExtraController@edit']);
        });

        // Free days
        Route::group(['prefix' => 'free-day', 'as' => 'free-day.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'FreeDayController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'FreeDayController@create']);
        });

        // Locations
        Route::group(['prefix' => 'location', 'as' => 'location.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'LocationController@index']);
            Route::get('create/{caren_location?}', ['as' => 'create', 'uses' => 'LocationController@create']);
            Route::get('{location}/edit/{tab?}', ['as' => 'edit', 'uses' => 'LocationController@edit']);
        });

        // Seasons
        Route::group(['prefix' => 'season', 'as' => 'season.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'SeasonController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'SeasonController@create']);
            Route::get('{season}/edit', ['as' => 'edit', 'uses' => 'SeasonController@edit']);
        });

        // Users
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
        });

        // Vendors
        Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'VendorController@index']);
            Route::get('create/{caren_vendor?}', ['as' => 'create', 'uses' => 'VendorController@create']);
            Route::get('{vendor}/edit/{tab?}', ['as' => 'edit', 'uses' => 'VendorController@edit']);
        });
    }
);
