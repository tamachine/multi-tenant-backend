<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Content Routes
|--------------------------------------------------------------------------
|
*/

Route::group(
    [
        'namespace' => 'Content'
    ],
    function () {
        // Content main routes
        Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
            Route::group(['prefix' => 'translations', 'as' => 'translation.'], function () {            
            Route::get('/', ['as' => 'index', 'uses' => 'TranslationController@index']);
        });                
    }
);
