<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class NavBarSeeder extends Seeder
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
                'group' => 'navbar',
                'key' => 'cars',
            ],
            [
                'text' => ['en' => 'Cars', 'es' => 'Flota'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'cars.small',
            ],
            [
                'text' => ['en' => 'Small & Medium', 'es' => 'Pequeños y Medianos'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'cars.large',
            ],
            [
                'text' => ['en' => 'Large', 'es' => 'Grandes'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'cars.premium',
            ],
            [
                'text' => ['en' => 'Premium', 'es' => 'Premium'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'about',
            ],
            [
                'text' => ['en' => 'About us', 'es' => 'Sobre nosotros'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'faq',
            ],
            [
                'text' => ['en' => 'FAQ', 'es' => 'FAQ'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'insurances',
            ],
            [
                'text' => ['en' => 'Insurance', 'es' => 'Seguros'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'blog',
            ],
            [
                'text' => ['en' => 'Blog', 'es' => 'Blog'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'contact',
            ],
            [
                'text' => ['en' => 'Contact', 'es' => 'Contacto'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'en',
            ],
            [
                'text' => ['en' => 'ENG', 'es' => 'ENG'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'es',
            ],
            [
                'text' => ['en' => 'ES', 'es' => 'ES'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'close',
            ],
            [
                'text' => ['en' => 'close', 'es' => 'cerrar'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'open',
            ],
            [
                'text' => ['en' => 'menu', 'es' => 'menu'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'email',
            ],
            [
                'text' => ['en' => 'info@reykjavikauto.com', 'es' => 'info@reykjavikauto.com'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'cars-title',
            ],
            [
                'text' => ['en' => 'Pay only 15% now', 'es' => 'Paga solo el 15% ahora'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'navbar',
                'key' => 'cars-button',
            ],
            [
                'text' => ['en' => 'View all cars', 'es' => 'Ver todos'],
            ]
        );


    }
}
