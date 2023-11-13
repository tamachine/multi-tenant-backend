<?php

namespace Database\Seeders\IcelandCars\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class GeneralSeeder extends Seeder
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
                'group' => 'general',
                'key' => 'brand',
            ],
            [
                'text' => ['en' => 'Iceland Cars', 'es' => 'Iceland Cars'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'search',
            ],
            [
                'text' => ['en' => 'Search', 'es' => 'Buscar'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'read-more',
            ],
            [
                'text' => ['en' => 'Read more', 'es' => 'Leer más'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'read-less',
            ],
            [
                'text' => ['en' => 'Read less', 'es' => 'Leer menos'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'after-meridiem',
            ],
            [
                'text' => ['en' => 'AM', 'es' => 'AM'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'post-meridiem',
            ],
            [
                'text' => ['en' => 'PM', 'es' => 'PM'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'languages-en',
            ],
            [
                'text' => ['en' => 'English', 'es' => 'Inglés'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'languages-es',
            ],
            [
                'text' => ['en' => 'Spanish', 'es' => 'Español'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'languages-de',
            ],
            [
                'text' => ['en' => 'Deutch', 'es' => 'Alemán'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'languages-fr',
            ],
            [
                'text' => ['en' => 'Français', 'es' => 'Francés'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'languages-da',
            ],
            [
                'text' => ['en' => 'Dansk', 'es' => 'Danés'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'languages-it',
            ],
            [
                'text' => ['en' => 'Italian', 'es' => 'Italiano'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'languages-remember',
            ],
            [
                'text' => ['en' => 'Remember that the final transaction will be made in ISK', 'es' => 'Recuerda que la transacción final se realizará en ISK'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'languages-language',
            ],
            [
                'text' => ['en' => 'Select language', 'es' => 'Selecciona idioma'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'languages-currency',
            ],
            [
                'text' => ['en' => 'Select currency', 'es' => 'Selecciona moneda'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'languages-apply',
            ],
            [
                'text' => ['en' => 'Change settings', 'es' => 'Cambiar opciones'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'modal-ok',
            ],
            [
                'text' => ['en' => 'Ok', 'es' => 'De acuerdo'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'general',
                'key' => 'minutes',
            ],
            [
                'text' => ['en' => ':time Minute|:time Minutes', 'es' => ':time Minuto|:time Minutos'],
            ]
        );
    }
}
