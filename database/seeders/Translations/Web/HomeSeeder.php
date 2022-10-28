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
        
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.box1-h2-title',    
            ],
            [                
                'text' => ['en' => 'Best way to find your perfect car in Iceland', 'es' => 'La mejor forma de encontrar el coche perfecto en Islandia'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.box1-h2-subtitle',    
            ],
            [                
                'text' => ['en' => 'We are locals and treat each customer to our acquired expertise and knowledge that is unsurpassed by any other car rental in Iceland.', 'es' => 'Somos locales y tratamos a cada cliente con nuestra experiencia y conocimiento adquiridos que no tienen comparación con ningún otro alquiler de autos en Islandia.'],
            ]
        ); 
    }
}
