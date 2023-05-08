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
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\FaqController;

use App\Http\Controllers\Web\CarsController;
use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\InsurancesController;
use App\Http\Controllers\Web\ExtrasController;
use App\Http\Controllers\Web\SummaryController;
use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Web\SuccessController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\BlogSearchStringController;
use App\Http\Controllers\Web\BlogSearchCategoryController;
use App\Http\Controllers\Web\BlogSearchTagController;
use App\Http\Controllers\Web\BlogSearchAuthorController;
use App\Http\Controllers\Web\TermsAndConditionsController;
use App\Http\Controllers\Web\LandingCarsController;


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

    Route::get('/', [HomeController::class, 'index'])->name('home');

    /* Auth */
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

    /** 
     * URLs are defined in UrlsSeeder class because they are stored in database
     * **/

    /* Static pages */
    Route::get(LaravelLocalization::transRoute('routes.about'), [AboutController::class, 'index'])->name('about');
    Route::get(LaravelLocalization::transRoute('routes.contact'), [ContactController::class, 'index'])->name('contact');
    Route::get(LaravelLocalization::transRoute('routes.faq'), [FaqController::class, 'index'])->name('faq');
    Route::get(LaravelLocalization::transRoute('routes.terms-and-conditions'), [TermsAndConditionsController::class, 'index'])->name('terms');

    /* Blog */
    Route::get(LaravelLocalization::transRoute('routes.blog'), [BlogController::class, 'index'])->name('blog'); 
    Route::get(LaravelLocalization::transRoute('routes.blog/preview/{blog_post_slug}'), [BlogController::class, 'preview'])->name('blog.preview'); 
    Route::get(LaravelLocalization::transRoute('routes.blog/search'), [BlogSearchStringController::class, 'index'])->name('blog.search.string');
    Route::get(LaravelLocalization::transRoute('routes.blog/category/{blog_category_slug}'), [BlogSearchCategoryController::class, 'index'])->name('blog.search.category');
    Route::get(LaravelLocalization::transRoute('routes.blog/tag/{blog_tag_slug}'), [BlogSearchTagController::class, 'index'])->name('blog.search.tag');
    Route::get(LaravelLocalization::transRoute('routes.blog/author/{blog_author_slug}'), [BlogSearchAuthorController::class, 'index'])->name('blog.search.author');    
    Route::get(LaravelLocalization::transRoute('routes.blog/post/{blog_post_slug}'), [BlogController::class, 'show'])->name('blog.show');     

    /* Booking process */
    Route::get('booking/{booking}/pdf', [BookingController::class, 'pdf'])->name('booking.pdf');
    Route::get(LaravelLocalization::transRoute('routes.cars'), [CarsController::class, 'index'])->name('cars');
    Route::get('/{car_hashid}/insurances', [InsurancesController::class, 'index'])->name('insurances');
    Route::get('/{car_hashid}/extras', [ExtrasController::class, 'index'])->name('extras');
    Route::get('/{car_hashid}/summary', [SummaryController::class, 'index'])->name('summary');
    Route::get(LaravelLocalization::transRoute('routes.payment'), [PaymentController::class, 'index'])->name('payment');
    Route::get(LaravelLocalization::transRoute('routes.success'), [SuccessController::class, 'index'])->name('success');

    /* landings */
    Route::get('/cars/small-medium', [LandingCarsController::class, 'small'])->name('cars.small');
    Route::get('/cars/large', [LandingCarsController::class, 'large'])->name('cars.large');
    Route::get('/cars/premium', [LandingCarsController::class, 'premium'])->name('cars.premium');

});