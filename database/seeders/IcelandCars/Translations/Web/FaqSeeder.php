<?php

namespace Database\Seeders\IcelandCars\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class FaqSeeder extends Seeder
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
                'group' => 'faq',
                'key' => 'contact-title',
            ],
            [
                'text' => ['en' => 'Can\'t find what you\'re looking for?', 'es' => '¿No encuentras lo que buscas?'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'faq',
                'key' => 'contact-subtitle',
            ],
            [
                'text' => ['en' => 'Get into touch with your question and we’ll get back to you as soon as possible.', 'es' => 'Contacta con nosotros y te contestaremos tan pronto como podamos'],
            ]
        );

    }
}
