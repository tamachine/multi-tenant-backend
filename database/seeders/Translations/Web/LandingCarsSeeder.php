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
                'text' => ['en' => 'Small and medium cars for your adventure', 'es' => 'Coches pequeños y medianos para tus aventuras'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'small-text',
            ],
            [
                'text' => ['en' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!', 'es' => 'Cambiar texto: While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'large-title',
            ],
            [
                'text' => ['en' => 'Large cars for your adventure', 'es' => 'Coches grandes para tus aventuras'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'large-text',
            ],
            [
                'text' => ['en' => 'Cambiar texto: While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!', 'es' => 'Cambiar texto: While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!'],
            ]
        );


        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'premium-title',
            ],
            [
                'text' => ['en' => 'Premium and vans for your adventure', 'es' => 'Coches premium y furgonetas para tus aventuras'],
            ]
        );


        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'premium-text',
            ],
            [
                'text' => ['en' => 'Cambiar texto: While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!', 'es' => 'Cambiar texto: While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!'],
            ]
        );
        
        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'testimonials-title',
            ],
            [
                'text' => ['en' => 'Testimonials', 'es' => 'Testimonios'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'testimonials-value',
            ],
            [
                'text' => ['en' => 'Excellent', 'es' => 'Excelente'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'testimonials-reviews',
            ],
            [
                'text' => ['en' => 'reviews on', 'es' => 'opiniones en'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'about-text',
            ],
            [
                'text' => ['en' => 'We strongly recommend you add extended coverage to reduce your liability. Take into consideration that Iceland is prone to extreme weather conditions and gravel road which can cause damage to your hire car. Without insurance, you would have to pay for this damage out of your own pocket.', 'es' => 'We strongly recommend you add extended coverage to reduce your liability. Take into consideration that Iceland is prone to extreme weather conditions and gravel road which can cause damage to your hire car. Without insurance, you would have to pay for this damage out of your own pocket.'],
            ]
        );
        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'about-text-extra',
            ],
            [
                'text' => ['en' => 'If you are insured through a third party insurance provider, such as a credit card or insurance company, you will first pay Lotus car rental for any damage and then get reimbursed through your insurance provider. Adding the insurance below will lower your deductible to 65.000 ISK (Gold Package) or 0 ISK (Platinum Package).<br><br>If you are not prepared to make this decision now, you can always.', 'es' => 'If you are insured through a third party insurance provider, such as a credit card or insurance company, you will first pay Lotus car rental for any damage and then get reimbursed through your insurance provider. Adding the insurance below will lower your deductible to 65.000 ISK (Gold Package) or 0 ISK (Platinum Package).<br><br>If you are not prepared to make this decision now, you can always.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'about-button',
            ],
            [
                'text' => ['en' => 'Learn more', 'es' => 'Más información'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'brands-title',
            ],
            [
                'text' => ['en' => 'Best brands available', 'es' => 'Mejores marcas disponibles'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'brands-text',
            ],
            [
                'text' => ['en' => 'If you are insured through a third party insurance provider, such as a credit card or insurance company, you will first pay without insurance, you would have to pay for this damage out of your own pocket.', 'es' => 'If you are insured through a third party insurance provider, such as a credit card or insurance company, you will first pay without insurance, you would have to pay for this damage out of your own pocket.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'brands-button',
            ],
            [
                'text' => ['en' => 'Learn more', 'es' => 'Más información'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'categories-title',
            ],
            [
                'text' => ['en' => "Different vehicles for all type of adventures", 'es' => "Different vehicles for all type of adventures"],
            ]
        );
    }
}
