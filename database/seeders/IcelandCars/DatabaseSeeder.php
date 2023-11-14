<?php

namespace Database\Seeders\IcelandCars;

use Database\Seeders\SeederInterface;
use Database\Seeders\IcelandCars\local\AffiliateSeeder;
use Database\Seeders\IcelandCars\local\CarSeeder;
use Database\Seeders\IcelandCars\local\ExtraSeeder;
use Database\Seeders\IcelandCars\local\VendorLocationSeeder;
use Database\Seeders\IcelandCars\production\AffiliateSeeder as ProductionAffiliateSeeder;
use Database\Seeders\IcelandCars\production\CarSeeder as ProductionCarSeeder;
use Database\Seeders\IcelandCars\production\ExtraSeeder as ProductionExtraSeeder;
use Database\Seeders\IcelandCars\production\VendorLocationSeeder as ProductionVendorLocationSeeder;

class DatabaseSeeder implements SeederInterface {

    public function localClasses(): array {
        return array_merge(
            $this->commonClasses(),
            [
                AffiliateSeeder::class,
                VendorLocationSeeder::class,
                CarSeeder::class,
                ExtraSeeder::class
            ]
        );
    }

    public function stagingClasses(): array {
        return $this->localClasses();
    }

    public function productionClasses(): array {
        return array_merge(
            $this->commonClasses(),
            [
                ProductionAffiliateSeeder::class,
                ProductionVendorLocationSeeder::class,
                ProductionCarSeeder::class,
                ProductionExtraSeeder::class
            ]
        );
    }

    private function commonClasses(): array
    {
        return [
            UserSeeder::class,
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