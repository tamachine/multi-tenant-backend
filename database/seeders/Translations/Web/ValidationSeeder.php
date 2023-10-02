<?php

namespace Database\Seeders\Translations\Web;

use App\Models\Translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValidationSeeder extends Seeder
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
                'group' => 'validation',
                'key' => 'required',
            ],
            [
                'text' => ['en' => 'This is a required field', 'es' => 'Este es un campo obligatorio.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'validation',
                'key' => 'email',
            ],
            [
                'text' => ['en' => 'The email must be a valid email address.', 'es' => 'El email debe ser una dirección de email válida.'],
            ]
        );

    }
}
