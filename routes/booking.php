<?php

use App\Http\Controllers\Booking\ContactFormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Booking Routes
|--------------------------------------------------------------------------
|
*/

Route::group(
    [
        'namespace' => 'Booking'
    ],
    function () {
        // Booking main routes
        Route::get('/', ['as' => 'dashboard', 'uses' => 'BookingController@dashboard']);
        Route::get('history', ['as' => 'history', 'uses' => 'BookingController@history']);
        Route::get('create', ['as' => 'create', 'uses' => 'BookingController@create']);
        Route::get('{booking}/edit/{tab?}', ['as' => 'edit', 'uses' => 'BookingController@edit']);

        // Affiliates
        Route::group(['prefix' => 'affiliate', 'as' => 'affiliate.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'AffiliateController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'AffiliateController@create']);
            Route::get('{affiliate}/edit/{tab?}', ['as' => 'edit', 'uses' => 'AffiliateController@edit']);
        });

        // Mailing
        Route::group(['prefix' => 'mailing', 'as' => 'mailing.'], function () {
            Route::get('{tab?}', ['as' => 'index', 'uses' => 'MailingController@index']);
        });

        // Contact Users
        Route::resource('/contact-users', ContactFormController::class, ['parameters' => ['contact_user' => 'hashid']]);

    }
);
