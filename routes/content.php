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
                                   
        Route::resource('translation', TranslationController::class, ['parameters'=> ['translation' => 'translation_hashid']])->except(['create', 'store', 'destroy']);
                            
    }
);
