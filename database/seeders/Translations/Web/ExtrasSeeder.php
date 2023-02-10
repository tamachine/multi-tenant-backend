<?php

namespace Database\Seeders\Translations\Web;

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

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'pickup',
            ],
            [
                'text' => ['en' => 'Pick up', 'es' => 'Recogida'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'return',
            ],
            [
                'text' => ['en' => 'Return', 'es' => 'Retorno'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'pickup-return-location',
            ],
            [
                'text' => ['en' => 'Pick up and return location', 'es' => 'Lugar de recogida y retorno'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'pickup-location',
            ],
            [
                'text' => ['en' => 'Pick up location', 'es' => 'Lugar de recogida'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'return-location',
            ],
            [
                'text' => ['en' => 'Return location', 'es' => 'Lugar de retorno'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'insurances',
            ],
            [
                'text' => ['en' => 'Insurances', 'es' => 'Seguros'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'extras',
            ],
            [
                'text' => ['en' => 'Extras', 'es' => 'Extras'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'free',
            ],
            [
                'text' => ['en' => 'Free', 'es' => 'Gratis'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'total',
            ],
            [
                'text' => ['en' => 'Total', 'es' => 'Total'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'pay-now-only',
            ],
            [
                'text' => ['en' => 'Pay now only', 'es' => 'Pague ahora sólo el'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'isk-transactions',
            ],
            [
                'text' => ['en' => 'Please note all transactions will be made in ISK', 'es' => 'Tenga en cuenta que todas las transacciones se realizarán en ISK'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'extras',
                'key' => 'continue',
            ],
            [
                'text' => ['en' => 'Continue', 'es' => 'Continue'],
            ]
        );
    }
}
