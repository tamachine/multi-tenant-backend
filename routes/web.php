<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\InsurancesController;
use App\Http\Controllers\Web\ExtrasController;
use App\Http\Controllers\Web\SummaryController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\BlogSearchCategoryController;
use App\Http\Controllers\Web\BlogSearchTagController;
use App\Http\Controllers\Web\BlogSearchAuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 
        'middleware' => [ 'localize' ]
    ],  function()
{

    /**
     * Fix for the issue:
     * When a Livewire component makes a request after the page has been loaded, it changes the current locale to a different locale.
     */
    Route::post('livewire/message/{name}', '\Livewire\Controllers\HttpConnectionHandler');    

    /****  AUTH ROUTES ****/

    Route::middleware('guest')->group(function () {
        Route::get('login', Login::class)
            ->name('login');
    });

    Route::get('password/reset', Email::class)
        ->name('password.request');

    Route::get('password/reset/{token}', Reset::class)
        ->name('password.reset');

    Route::middleware('auth')->group(function () {
        Route::get('email/verify', Verify::class)
            ->middleware('throttle:6,1')
            ->name('verification.notice');

        Route::get('password/confirm', Confirm::class)
            ->name('password.confirm');
    });

    Route::middleware('auth')->group(function () {
        Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
            ->middleware('signed')
            ->name('verification.verify');

        Route::post('logout', LogoutController::class)
            ->name('logout');
    });

    /**** WEB ROUTES *****/
    /** NOTES:
     *  - URLs are defined in UrlsSeeder class because they are stored in database
     *  - Pages that need seo-configuration have to be stored in database so they have to be defined in RoutesForPages class
     * **/
     
    if (!App::runningInConsole()) { //to fix migrations to fail. Routes are loading before migrations but they are database dependant.           
        RoutesForPages::registerRoutes(); // Routes stored in database (Pages)
    }
    
    /* Booking process */
    Route::get('booking/{booking}/pdf', [BookingController::class, 'pdf'])->name('booking.pdf');   
});