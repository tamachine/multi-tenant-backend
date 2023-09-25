<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguageLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Translations\Web\AboutSeeder::class);
        $this->call(Translations\Web\AppErrorsSeeder::class);
        $this->call(Translations\Web\BlogSearchSeeder::class);
        $this->call(Translations\Web\BlogSeeder::class);        
        $this->call(Translations\Web\BreadcrumbsSeeder::class);
        $this->call(Translations\Web\CancellationPolicySeeder::class);
        $this->call(Translations\Web\CarSearchBarSeeder::class);
        $this->call(Translations\Web\CarsSeeder::class);
        $this->call(Translations\Web\ContactSeeder::class);        
        $this->call(Translations\Web\DealsSeeder::class);
        $this->call(Translations\Web\ExtrasSeeder::class);
        $this->call(Translations\Web\FaqSeeder::class);
        $this->call(Translations\Web\FooterSeeder::class);
        $this->call(Translations\Web\GeneralSeeder::class);
        $this->call(Translations\Web\HomeSeeder::class);
        $this->call(Translations\Web\InsurancesSeeder::class);
        $this->call(Translations\Web\LandingCarsSeeder::class);
        $this->call(Translations\Web\LandingInsurancesSeeder::class);
        $this->call(Translations\Web\LegalNoticeSeeder::class);
        $this->call(Translations\Web\NavBarSeeder::class);
        $this->call(Translations\Web\NewsletterSeeder::class);        
        $this->call(Translations\Web\PaymentSeeder::class);
        $this->call(Translations\Web\PrivacyAndCookiePolicySeeder::class);
        $this->call(Translations\Web\ReviewsSeeder::class);
        $this->call(Translations\Web\StepsSeeder::class);
        $this->call(Translations\Web\SuccessSeeder::class);
        $this->call(Translations\Web\SummarySeeder::class);
        $this->call(Translations\Web\TermsAndConditionSeeder::class);     
        $this->call(Translations\Web\UrlsSeeder::class);  
        $this->call(Translations\Web\ValidationSeeder::class);            
    }
}
