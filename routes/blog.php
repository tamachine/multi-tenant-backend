<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
|
*/

Route::group(
    [
        'namespace' => 'Blog'
    ],
    function () {
        // Blog main route
        Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

        // Authors
        Route::group(['prefix' => 'author', 'as' => 'author.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'AuthorController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'AuthorController@create']);
            Route::get('{author}/edit', ['as' => 'edit', 'uses' => 'AuthorController@edit']);
        });
    }
);
