<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CarsController;
use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\InsurancesController;
use App\Http\Controllers\Web\ExtrasController;
use App\Http\Controllers\Web\SummaryController;
use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Web\SuccessController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cars', [CarsController::class, 'index'])->name('cars');
Route::get('/{car_hashid}/insurances', [InsurancesController::class, 'index'])->name('insurances');
Route::get('/{car_hashid}/extras', [ExtrasController::class, 'index'])->name('extras');
Route::get('/{car_hashid}/summary', [SummaryController::class, 'index'])->name('summary');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('/success', [SuccessController::class, 'index'])->name('success');

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

Route::get('booking/{booking}/pdf', [BookingController::class, 'pdf'])->name('booking.pdf');
/*
Route::get('/tokens/create', function (Request $request) {
    $token = App\Models\User::where('name', 'api')->first()->createToken('front-end-1');

    echo '<b>token</b>: '.$token->plainTextToken.'<br>';
    echo '<b>get</b>: '. '/api/user<br>';
    echo '<b>headers</b>: <br>';
    echo 'Accept: application/json <br>';
    echo 'Authorization: Basic *****, Bearer '.$token->plainTextToken.' <br>';

    die;
});
*/
