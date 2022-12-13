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
                'group' => 'web',
                'key' => 'car-search-bar.same',    
            ],
            [                
                'text' => ['en' => 'Same location', 'es' => 'Mismo orígen'],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.different',    
            ],
            [                
                'text' => ['en' => 'Different location', 'es' => 'Orígenes distintos'],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.first-day',    
            ],
            [                
                'text' => ['en' => 'First day', 'es' => 'Inicio'],
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.last-day',    
            ],
            [                
                'text' => ['en' => 'Last day', 'es' => 'Fin'],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.pick-up-day',    
            ],
            [                
                'text' => ['en' => 'Pick up day', 'es' => 'Día de recogida'],
            ]
        );  
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.drop-off-day',    
            ],
            [                
                'text' => ['en' => 'Drop off day', 'es' => 'Día de entrega'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.pick-up',    
            ],
            [                
                'text' => ['en' => 'Pick up', 'es' => 'Recogida'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.drop-off',    
            ],
            [                
                'text' => ['en' => 'Drop off', 'es' => 'Entrega'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.return',    
            ],
            [                
                'text' => ['en' => 'Return', 'es' => 'Vuelta'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.select-location',    
            ],
            [                
                'text' => ['en' => 'Select location', 'es' => 'Selección ubicación'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.select-hours',    
            ],
            [                
                'text' => ['en' => 'Select your pick up and return time', 'es' => 'Selecciona la hora de recogida y retorno'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.hours-pickup',    
            ],
            [                
                'text' => ['en' => 'Pick up', 'es' => 'Recogida'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.hours-return',    
            ],
            [                
                'text' => ['en' => 'Return', 'es' => 'Retorno'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.mobile-first-input-title',    
            ],
            [                
                'text' => ['en' => 'Calendar', 'es' => 'Calendario'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'car-search-bar.mobile-first-input-placeholder',    
            ],
            [                
                'text' => ['en' => 'Pick up & return days', 'es' => 'Recogida y retorno'],
            ]
        );  
    }
}
