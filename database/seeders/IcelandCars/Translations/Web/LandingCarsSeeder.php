<?php

namespace Database\Seeders\IcelandCars\Translations\Web;

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

        /******************
            INTRO
        ******************/

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
                'text' => ['en' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!', 'es' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!'],
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
                'text' => ['en' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!', 'es' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!'],
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
                'text' => ['en' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!', 'es' => 'While small in size, our Economy and City Car rentals offer excellent performance at a reduced price. A perfect choice for short trips around Reykjavík or even the Ring Road if the weather is good. Driving around Iceland has never been easier!'],
            ]
        );


        /******************
            TESTIMONIALS
        ******************/
        
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


        /******************
            ABOUT
        ******************/

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'about-text',
            ],
            [
                'text' => ['en' => 'We strongly recommend you add extended coverage to reduce your liability. Take into consideration that Iceland is prone to extreme weather conditions and gravel road which can cause damage to your hire car. Without insurance, you would have to pay for this damage out of your own pocket.<br><br>If you are insured through a third party insurance provider, such as a credit card or insurance company, you will first pay Lotus car rental for any damage and then get reimbursed through your insurance provider. Adding the insurance below will lower your deductible to 65.000 ISK (Gold Package) or 0 ISK (Platinum Package).<br><br>If you are not prepared to make this decision now, you can always.', 'es' => 'We strongly recommend you add extended coverage to reduce your liability. Take into consideration that Iceland is prone to extreme weather conditions and gravel road which can cause damage to your hire car. Without insurance, you would have to pay for this damage out of your own pocket.<br><br>If you are insured through a third party insurance provider, such as a credit card or insurance company, you will first pay Lotus car rental for any damage and then get reimbursed through your insurance provider. Adding the insurance below will lower your deductible to 65.000 ISK (Gold Package) or 0 ISK (Platinum Package).<br><br>If you are not prepared to make this decision now, you can always.'],
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


        /******************
            BRANDS
        ******************/

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


        /******************
            OTHER LANDINGS
        ******************/

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'otherlandings-title',
            ],
            [
                'text' => ['en' => "Different vehicles for all type of adventures", 'es' => "Different vehicles for all type of adventures"],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'otherlandings-small-name',
            ],
            [
                'text' => ['en' => "Small vehicles", 'es' => "Coches pequeños"],
            ]
        );
        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'otherlandings-small-text',
            ],
            [
                'text' => ['en' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all.", 'es' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all."],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'otherlandings-large-name',
            ],
            [
                'text' => ['en' => "Large vehicles", 'es' => "Coches grandes"],
            ]
        );
        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'otherlandings-large-text',
            ],
            [
                'text' => ['en' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all.", 'es' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all."],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'otherlandings-premium-name',
            ],
            [
                'text' => ['en' => "Premium vehicles", 'es' => "Coches premium"],
            ]
        );
        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'otherlandings-premium-text',
            ],
            [
                'text' => ['en' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all.", 'es' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all."],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'otherlandings-view-more',
            ],
            [
                'text' => ['en' => "View more", 'es' => "Ver más"],
            ]
        );
        Translation::firstOrCreate(
            [
                'group' => 'landing-cars',
                'key' => 'otherlandings-view-less',
            ],
            [
                'text' => ['en' => "View less", 'es' => "Ver menos"],
            ]
        );
    }
}
