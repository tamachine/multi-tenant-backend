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

        // Categories
        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'CategoryController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'CategoryController@create']);
            Route::get('{category}/edit', ['as' => 'edit', 'uses' => 'CategoryController@edit']);
        });

        // Tags
        Route::group(['prefix' => 'tag', 'as' => 'tag.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'TagController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'TagController@create']);
            Route::get('{tag}/edit', ['as' => 'edit', 'uses' => 'TagController@edit']);
        });

        // Posts
        Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'PostController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'PostController@create']);
            Route::get('{post}/edit', ['as' => 'edit', 'uses' => 'PostController@edit']);
        });

        // Import
        Route::group(['prefix' => 'import', 'as' => 'import.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'ImportController@index']);
            Route::post('/upload', ['as' => 'upload', 'uses' => 'ImportController@upload']);
        });
    }
);
