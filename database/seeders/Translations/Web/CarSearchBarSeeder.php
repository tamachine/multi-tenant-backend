<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class CarSearchBarSeeder extends Seeder
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
                'key' => 'car-search-bar.same',    
            ],
            [                
                'text' => ['en' => 'Same location', 'es' => 'Mismo orígen'],
            ]
        );   

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.different',    
            ],
            [                
                'text' => ['en' => 'Different location', 'es' => 'Orígenes distintos'],
            ]
        );   

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.first-day',    
            ],
            [                
                'text' => ['en' => 'First day', 'es' => 'Inicio'],
            ]
        );   
        
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.last-day',    
            ],
            [                
                'text' => ['en' => 'Last day', 'es' => 'Fin'],
            ]
        );   

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.pick-up-day',    
            ],
            [                
                'text' => ['en' => 'Pick up day', 'es' => 'Día de recogida'],
            ]
        );  
        
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.drop-off-day',    
            ],
            [                
                'text' => ['en' => 'Drop off day', 'es' => 'Día de entrega'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.pick-up',    
            ],
            [                
                'text' => ['en' => 'Pick up', 'es' => 'Recogida'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.drop-off',    
            ],
            [                
                'text' => ['en' => 'Drop off', 'es' => 'Entrega'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.return',    
            ],
            [                
                'text' => ['en' => 'Return', 'es' => 'Vuelta'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.select-location',    
            ],
            [                
                'text' => ['en' => 'Select location', 'es' => 'Selección ubicación'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.select-hours',    
            ],
            [                
                'text' => ['en' => 'Select your pick up and return time', 'es' => 'Selecciona la hora de recogida y retorno'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.hours-pickup',    
            ],
            [                
                'text' => ['en' => 'Pick up', 'es' => 'Recogida'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.hours-return',    
            ],
            [                
                'text' => ['en' => 'Return', 'es' => 'Retorno'],
            ]
        );  
    }
}
