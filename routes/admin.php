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

        // Vendors
        Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'VendorController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'VendorController@create']);
            Route::get('{vendor}/edit', ['as' => 'edit', 'uses' => 'VendorController@edit']);
        });
    }
);
