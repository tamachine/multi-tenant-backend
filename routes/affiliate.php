<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Affiliate Routes
|--------------------------------------------------------------------------
|
*/

Route::group(
    [
        'namespace' => 'Affiliate'
    ],
    function () {
        Route::get('/{tab?}', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);
    }
);
