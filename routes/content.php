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
        Route::resource('faq', FAQController::class, ['parameters'=> ['faq' => 'faq_hashid']]);   
        Route::resource('faq-category', FAQCategoryController::class, ['parameters'=> ['faq_category' => 'faq_category_hashid']]);         
        Route::resource('page', PageController::class, ['parameters'=> ['page' => 'page_hashid']])->except(['create', 'store', 'destroy']);                     
        
    }
);
