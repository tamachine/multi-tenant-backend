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
                'key' => 'pick-up-day',    
            ],
            [                
                'text' => ['en' => 'First day', 'es' => 'Inicio'],
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'return-day',    
            ],
            [                
                'text' => ['en' => 'Last day', 'es' => 'Fin'],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'pick-up-day-placeholder',    
            ],
            [                
                'text' => ['en' => 'Pick up day', 'es' => 'Día de recogida'],
            ]
        );  
        
        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'return-day-placeholder',    
            ],
            [                
                'text' => ['en' => 'Return day', 'es' => 'Día de entrega'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'time',    
            ],
            [                
                'text' => ['en' => 'Time', 'es' => 'Hora'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'pick-up-time',    
            ],
            [                
                'text' => ['en' => 'Pick up Time', 'es' => 'Recogida'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'return-time',    
            ],
            [                
                'text' => ['en' => 'Return Time', 'es' => 'Entrega'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'pick-up-location',    
            ],
            [                
                'text' => ['en' => 'Pick up', 'es' => 'Recogida'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'return-location',    
            ],
            [                
                'text' => ['en' => 'Return', 'es' => 'Entrega'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'title-location',    
            ],
            [                
                'text' => ['en' => 'Pick up & Return Location', 'es' => 'Lugar de Recogida & Entrega'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'pick-up-location-title',    
            ],
            [                
                'text' => ['en' => 'Pick up', 'es' => 'Recogida'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'return-location-title',    
            ],
            [                
                'text' => ['en' => 'Return', 'es' => 'Entrega'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'same-location',    
            ],
            [                
                'text' => ['en' => 'Same location', 'es' => 'Mismo lugar'],
            ]
        ); 
        
        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'different-location',    
            ],
            [                
                'text' => ['en' => 'Different location', 'es' => 'Lugares diferentes'],
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
