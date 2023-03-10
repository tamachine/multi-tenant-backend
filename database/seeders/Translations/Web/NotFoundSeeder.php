<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class NotFoundSeeder extends Seeder
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
                'group' => 'not-found',
                'key' => 'title',
            ],
            [
                'text' => [
                    'en' => 'While this page no longer exists, we wanted to leave you with this funny picture.',
                    'es' => 'Aunque esta página ya no existe, queríamos dejaros con esta divertida imagen.'
                ],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'not-found',
                'key' => 'button',
            ],
            [
                'text' => ['en' => 'Go to homepage', 'es' => 'Ir a la página de inicio'],
            ]
        );
    }
}
