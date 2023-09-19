<?php

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

Route::get('pageclasses', 'PagesController@classes'); 
Route::get('pages/{api_page_name}/seoconfigurations', 'PagesController@seoConfigurations'); 
Route::apiResource('pages', PagesController::class, ['parameters' => ['pages' => 'api_page_name']])->only(['index', 'show']);

Route::get('postauthors/{api_blog_author_slug}/seoconfigurations/{api_page_name}', 'BlogAuthorsController@seoConfigurations'); 
Route::get('postcategories/{api_blog_category_slug}/seoconfigurations/{api_page_name}', 'BlogCategoriesController@seoConfigurations'); 
Route::get('posts/{api_blog_post_slug}/seoconfigurations/{api_page_name}', 'BlogPostsController@seoConfigurations'); 

Route::apiResource('postauthors', BlogAuthorsController::class, ['parameters' => ['postauthors' => 'api_blog_author_slug']])->only(['index','show']);    
Route::apiResource('postcategories', BlogCategoriesController::class, ['parameters' => ['postcategories' => 'api_blog_category_slug']])->only(['index', 'show']);    
Route::apiResource('posttags', BlogTagsController::class, ['parameters' => ['posttags' => 'api_blog_tag_slug']])->only(['index', 'show']);    
Route::apiResource('posts', BlogPostsController::class, ['parameters' => ['posts' => 'api_blog_post_slug']])->only(['index', 'show']);    

Route::get('postpreview/{api_blog_post_slug}/token/{token}/verify', 'BlogPostsPreviewController@verify'); 

Route::put('/newsletteruser/submitted', 'NewsletterUserController@submitted');
Route::put('/contactform/submitted', 'ContactFormController@submitted');






