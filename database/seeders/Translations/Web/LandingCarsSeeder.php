<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class LandingCarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'small-title',
            ],
            [
                'text' => ['en' => 'Small and medium cars for your adventure', 'es' => 'Coches pequeños y medianos para tus aventura'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'small-text',
            ],
            [
                'text' => ['en' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!', 'es' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'large-title',
            ],
            [
                'text' => ['en' => 'Large cars for your adventure', 'es' => 'Coches grandes para tus aventura'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'large-text',
            ],
            [
                'text' => ['en' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!', 'es' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!'],
            ]
        );


        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'premium-title',
            ],
            [
                'text' => ['en' => 'Premium and vans for your adventure', 'es' => 'Coches premium y furgonetas para tus aventura'],
            ]
        );


        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'premium-text',
            ],
            [
                'text' => ['en' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!', 'es' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!'],
            ]
        );
    }
}
