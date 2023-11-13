<?php

namespace Database\Seeders\IcelandCars\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class ExtrasSeeder extends Seeder
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
                'group' => 'extras',
                'key' => 'title',
            ],
            [
                'text' => ['en' => 'All our cars come fully serviced', 'es' => 'Todos nuestros autos vienen completamente revisados.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'subtitle',
            ],
            [
                'text' => ['en' => 'with unlimited mileage, studded winter tires<br>(from Now. 1st to Apr. 15th), and free cancellation.', 'es' => 'con kilometraje ilimitado, neumáticos de invierno con clavos<br>(del 1 de Ahora al 15 de Abr), y cancelación gratuita.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'price_mode.per_day',
            ],
            [
                'text' => ['en' => 'per day', 'es' => 'por día'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'price_mode.per_rental',
            ],
            [
                'text' => ['en' => 'per rental', 'es' => 'por alquiler'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'more',
            ],
            [
                'text' => ['en' => 'View more', 'es' => 'Ver más'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'continue',
            ],
            [
                'text' => ['en' => 'Continue', 'es' => 'Continuar'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'included',
            ],
            [
                'text' => ['en' => 'Included', 'es' => 'Incluido'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'selected',
            ],
            [
                'text' => ['en' => 'Selected', 'es' => 'Seleccionado'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'select',
            ],
            [
                'text' => ['en' => 'Select', 'es' => 'Seleccionar'],
            ]
        );
    }
}
