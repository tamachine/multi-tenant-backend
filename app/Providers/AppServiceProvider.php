<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Services\PreferredLanguage\ApplyPreferredLanguageToLanguageSession;
use App\Services\PreferredLanguage\PreferredLanguage;
use App\Services\RoutesForPages\RoutesForPages;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApplyPreferredLanguageToLanguageSession::class, function($app) {
			return new ApplyPreferredLanguageToLanguageSession(new PreferredLanguage());
		});       

        $this->app->bind('RoutesForPages',function(){
            return new RoutesForPages();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
