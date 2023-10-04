<?php

namespace App\Providers;

use App\Services\HTMLLang;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Services\PreferredLanguage\ApplyPreferredLanguageToLanguageSession;
use App\Services\PreferredLanguage\PreferredLanguage;
use App\Services\RoutesForPages\RoutesForPages;
use App\Services\SeoConfigurations;
use App\Services\Valitor\Valitor;
use App\Services\Car\CarsSearch\InitialValues;

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

        $this->app->bind('Valitor', function ($app) {            
            return new Valitor();
        });

        $this->app->bind('CarSearchInitialValues', function ($app) {            
            return new InitialValues();
        });

        $this->app->bind('getHTMLLang',function(){            
            $HTMLLang = new HTMLLang(new SeoConfigurations);
            return $HTMLLang->getHTMLLang();
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
