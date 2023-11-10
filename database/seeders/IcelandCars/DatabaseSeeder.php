<?php

namespace Database\Seeders\IcelandCars;


use Database\Seeders\SeederInterface;
use Database\Seeders\IcelandCars\BlogSeeder;
use Database\Seeders\IcelandCars\AffiliateSeeder;
use Database\Seeders\IcelandCars\CarSeeder;
use Database\Seeders\IcelandCars\ExtraSeeder;
use Database\Seeders\IcelandCars\UserSeeder;
use Database\Seeders\IcelandCars\VendorLocationSeeder;
use Database\Seeders\IcelandCars\ContactUserDetailsTypesSeeder;
use Database\Seeders\IcelandCars\CurrencyRateSeeder;
use Database\Seeders\IcelandCars\CurrencySeeder;
use Database\Seeders\IcelandCars\FaqsSeeder;
use Database\Seeders\IcelandCars\InsurancesFeaturesSeeder;
use Database\Seeders\IcelandCars\LanguageLineSeeder;
use Database\Seeders\IcelandCars\PageSeeder;
use Database\Seeders\IcelandCars\SeoConfigurationSeeder;

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