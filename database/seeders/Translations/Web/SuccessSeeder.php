<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class SuccessSeeder extends Seeder
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
                'group' => 'success',
                'key' => 'title',
            ],
            [
                'text' => ['en' => 'Your reservation has been confirmed!', 'es' => 'Tu reserva ha sido confirmada'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'success',
                'key' => 'subtitle',
            ],
            [
                'text' => ['en' => 'Our five star customer service is 24h seven days a week available for you.', 'es' => 'Nuestro servicio de atención al cliente de cinco estrellas está disponible las 24 horas, los siete días de la semana.'],
            ]
        );
    }
}
