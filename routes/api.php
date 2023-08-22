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



Route::apiResource('translationgroups', TranslationGroupsController::class)->only('index');   
Route::apiResource('translations', TranslationsController::class, ['parameters' => ['translations' => 'api_translation_full_key']])->only(['index', 'show']);     

Route::apiResource('faqcategories', FaqCategoriesController::class)->only('index');     
Route::apiResource('faqs', FaqsController::class, ['parameters' => ['faqs' => 'api_faq_hashid']])->only(['index', 'show']);     

Route::apiResource('carcategories', CarCategoriesController::class)->only(['index']);     
Route::apiResource('carfilters', CarFiltersController::class, ['parameters' => ['carfilters' => 'car_filter_id']])->only(['index', 'show']);     
Route::apiResource('cars', CarsController::class)->only('index');

Route::apiResource('locations', LocationsController::class)->only('index');

Route::apiResource('config', ConfigController::class)->only('index');

Route::get('pages/{api_page_name}/seoconfigurations', 'PagesController@seoConfigurations'); 
Route::apiResource('pages', PagesController::class, ['parameters' => ['pages' => 'api_page_name']])->only(['index', 'show']);

Route::get('posts/{api_blog_post_slug}/seoconfigurations/{api_page_name}', 'BlogPostsController@seoConfigurations'); 
Route::apiResource('posts', BlogPostsController::class, ['parameters' => ['posts' => 'api_blog_post_slug']])->only(['index', 'show']);    





