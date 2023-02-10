<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class SummarySeeder extends Seeder
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
                'group' => 'summary',
                'key' => 'pickup',
            ],
            [
                'text' => ['en' => 'Pick up', 'es' => 'Recogida'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'return',
            ],
            [
                'text' => ['en' => 'Return', 'es' => 'Retorno'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'pickup-return-location',
            ],
            [
                'text' => ['en' => 'Pick up and return location', 'es' => 'Lugar de recogida y retorno'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'pickup-location',
            ],
            [
                'text' => ['en' => 'Pick up location', 'es' => 'Lugar de recogida'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'return-location',
            ],
            [
                'text' => ['en' => 'Return location', 'es' => 'Lugar de retorno'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'insurances',
            ],
            [
                'text' => ['en' => 'Insurances', 'es' => 'Seguros'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'extras',
            ],
            [
                'text' => ['en' => 'Extras', 'es' => 'Extras'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'free',
            ],
            [
                'text' => ['en' => 'Free', 'es' => 'Gratis'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'total',
            ],
            [
                'text' => ['en' => 'Total', 'es' => 'Total'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'pay-now-only',
            ],
            [
                'text' => ['en' => 'Pay now only', 'es' => 'Pague ahora sólo el'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'isk-transactions',
            ],
            [
                'text' => ['en' => 'Please note all transactions will be made in ISK', 'es' => 'Tenga en cuenta que todas las transacciones se realizarán en ISK'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'continue',
            ],
            [
                'text' => ['en' => 'Continue', 'es' => 'Continue'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'summary',
                'key' => 'reserve-now',
            ],
            [
                'text' => ['en' => 'Reserve now', 'es' => 'Reserve ahora'],
            ]
        );
    }
}
