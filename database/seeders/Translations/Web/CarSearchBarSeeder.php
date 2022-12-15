<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class CarSearchBarSeeder extends Seeder
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
                'group' => 'car-search-bar',
                'key' => 'same',    
            ],
            [                
                'text' => ['en' => 'Same location', 'es' => 'Mismo orígen'],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'different',    
            ],
            [                
                'text' => ['en' => 'Different location', 'es' => 'Orígenes distintos'],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'first-day',    
            ],
            [                
                'text' => ['en' => 'First day', 'es' => 'Inicio'],
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'last-day',    
            ],
            [                
                'text' => ['en' => 'Last day', 'es' => 'Fin'],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'pick-up-day',    
            ],
            [                
                'text' => ['en' => 'Pick up day', 'es' => 'Día de recogida'],
            ]
        );  
        
        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'drop-off-day',    
            ],
            [                
                'text' => ['en' => 'Drop off day', 'es' => 'Día de entrega'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'pick-up',    
            ],
            [                
                'text' => ['en' => 'Pick up', 'es' => 'Recogida'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'drop-off',    
            ],
            [                
                'text' => ['en' => 'Drop off', 'es' => 'Entrega'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'return',    
            ],
            [                
                'text' => ['en' => 'Return', 'es' => 'Vuelta'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'select-location',    
            ],
            [                
                'text' => ['en' => 'Select location', 'es' => 'Selección ubicación'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'select-hours',    
            ],
            [                
                'text' => ['en' => 'Select your pick up and return time', 'es' => 'Selecciona la hora de recogida y retorno'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'hours-pickup',    
            ],
            [                
                'text' => ['en' => 'Pick up', 'es' => 'Recogida'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'hours-return',    
            ],
            [                
                'text' => ['en' => 'Return', 'es' => 'Retorno'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-first-input-title',    
            ],
            [                
                'text' => ['en' => 'Calendar', 'es' => 'Calendario'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-first-input-placeholder',    
            ],
            [                
                'text' => ['en' => 'Pick up & return days', 'es' => 'Recogida y retorno'],
            ]
        );  
    }
}
