<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Developer Routes
|--------------------------------------------------------------------------
|
*/

Route::group(
    [
        'namespace' => 'Developer'
    ],
    function () {
        // Developers (users)
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
        });

        Route::group(['namespace' => 'Api', 'prefix' => 'api', 'as' => 'api.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'ApiController@index']);            
        });
    }
);
