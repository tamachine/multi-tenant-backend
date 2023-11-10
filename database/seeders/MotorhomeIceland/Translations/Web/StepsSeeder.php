<?php

namespace Database\Seeders\MotorhomeIceland\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class StepsSeeder extends Seeder
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
                'group' => 'steps',
                'key' => 'insurances',
            ],
            [
                'text' => ['en' => 'Insurance', 'es' => 'Seguros'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'steps',
                'key' => 'extras',
            ],
            [
                'text' => ['en' => 'Extras', 'es' => 'Extras'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'steps',
                'key' => 'summary',
            ],
            [
                'text' => ['en' => 'Summary', 'es' => 'Resumen'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'steps',
                'key' => 'personal-details',
            ],
            [
                'text' => ['en' => 'Personal details', 'es' => 'Datos personales'],
            ]
        );

        
    }
}
