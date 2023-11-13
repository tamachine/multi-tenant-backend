<?php

namespace Database\Seeders\MotorhomeIceland;

use Database\Seeders\SeederInterface;
use Database\Seeders\MotorhomeIceland\BlogSeeder;
use Database\Seeders\MotorhomeIceland\AffiliateSeeder;
use Database\Seeders\MotorhomeIceland\CarSeeder;
use Database\Seeders\MotorhomeIceland\ExtraSeeder;
use Database\Seeders\MotorhomeIceland\UserSeeder;
use Database\Seeders\MotorhomeIceland\VendorLocationSeeder;
use Database\Seeders\MotorhomeIceland\ContactUserDetailsTypesSeeder;
use Database\Seeders\MotorhomeIceland\CurrencyRateSeeder;
use Database\Seeders\MotorhomeIceland\CurrencySeeder;
use Database\Seeders\MotorhomeIceland\FaqsSeeder;
use Database\Seeders\MotorhomeIceland\InsurancesFeaturesSeeder;
use Database\Seeders\MotorhomeIceland\LanguageLineSeeder;
use Database\Seeders\MotorhomeIceland\PageSeeder;
use Database\Seeders\MotorhomeIceland\SeoConfigurationSeeder;

class DatabaseSeeder implements SeederInterface {

    public function localClasses(): array {
        return [
            UserSeeder::class,
            AffiliateSeeder::class,
            VendorLocationSeeder::class,
            CarSeeder::class,
            ExtraSeeder::class,
            LanguageLineSeeder::class,
            FaqsSeeder::class,                                        
            InsurancesFeaturesSeeder::class,
            BlogSeeder::class,
            CurrencySeeder::class,
            CurrencyRateSeeder::class,
            ContactUserDetailsTypesSeeder::class,
            PageSeeder::class,
            SeoConfigurationSeeder::class
        ];
    }

    public function stagingClasses(): array {
        return $this->localClasses();
    }

    public function productionClasses(): array {
        return [];
    }
}