<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {                
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.title',    
            ],
            [                
                'text' => ['en' => 'A road ready for you', 'es' => 'Un camino listo para ti'],
            ]
        );   
        
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.subtitle',    
            ],
            [                
                'text' => ['en' => 'The best car rental in Iceland', 'es' => 'El mejor alquiler de coches en Islandia'],
            ]
        );        
    }
}
