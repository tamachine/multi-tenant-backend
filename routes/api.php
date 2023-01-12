<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('translationgroups', ['uses' => 'TranslationsController@groups']);
Route::resource('translations', TranslationsController::class, ['parameters' => ['translations' => 'translation_full_key']])->only(['index', 'show']);     

Route::get('faqcategories', ['uses' => 'FaqsController@categories']);
Route::resource('faqs', FaqsController::class, ['parameters' => ['faqs' => 'faq_hashid']])->only(['index', 'show']);     

Route::resource('carssearchfilters', CarsSearchFiltersController::class, ['parameters' => ['carssearchfilters' => 'car_search_filter_id']])->only(['index', 'show']);     

        