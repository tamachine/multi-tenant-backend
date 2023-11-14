<?php

namespace Database\Seeders\IcelandCars;

use Database\Seeders\SeederInterface;
use Database\Seeders\IcelandCars\BlogSeeder;
use Database\Seeders\IcelandCars\UserSeeder;
use Database\Seeders\IcelandCars\ContactUserDetailsTypesSeeder;
use Database\Seeders\IcelandCars\CurrencyRateSeeder;
use Database\Seeders\IcelandCars\CurrencySeeder;
use Database\Seeders\IcelandCars\FaqsSeeder;
use Database\Seeders\IcelandCars\InsurancesFeaturesSeeder;
use Database\Seeders\IcelandCars\LanguageLineSeeder;
use Database\Seeders\IcelandCars\local\AffiliateSeeder;
use Database\Seeders\IcelandCars\local\CarSeeder;
use Database\Seeders\IcelandCars\local\ExtraSeeder;
use Database\Seeders\IcelandCars\local\VendorLocationSeeder;
use Database\Seeders\IcelandCars\PageSeeder;
use Database\Seeders\IcelandCars\production\AffiliateSeeder as ProductionAffiliateSeeder;
use Database\Seeders\IcelandCars\production\CarSeeder as ProductionCarSeeder;
use Database\Seeders\IcelandCars\production\ExtraSeeder as ProductionExtraSeeder;
use Database\Seeders\IcelandCars\production\VendorLocationSeeder as ProductionVendorLocationSeeder;
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
        return [
            UserSeeder::class,
            ProductionAffiliateSeeder::class,
            ProductionVendorLocationSeeder::class,
            ProductionCarSeeder::class,
            ProductionExtraSeeder::class,
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
}