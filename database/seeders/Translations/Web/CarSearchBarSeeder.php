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
                'key' => 'start-day',    
            ],
            [                
                'text' => ['en' => 'First day', 'es' => 'Inicio'],
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'end-day',    
            ],
            [                
                'text' => ['en' => 'Last day', 'es' => 'Fin'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'start-day-placeholder',    
            ],
            [                
                'text' => ['en' => 'Pick up day', 'es' => 'Día de recogida'],
            ]
        );  
        
        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'end-day-placeholder',    
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
                'key' => 'start-time',    
            ],
            [                
                'text' => ['en' => 'Pick up Time', 'es' => 'Recogida'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'end-time',    
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


        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-time-title',    
            ],
            [                
                'text' => ['en' => 'What time do you require the vehicle?', 'es' => 'Selecciona el horario de recogida y devolución'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-continue-button',    
            ],
            [                
                'text' => ['en' => 'Continue', 'es' => 'Continuar'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-pickup-location-title',    
            ],
            [                
                'text' => ['en' => 'Pick up location', 'es' => 'Lugar de recogida'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-return-location-title',    
            ],
            [                
                'text' => ['en' => 'Return location', 'es' => 'Lugar de revolución'],
            ]
        );  
        
    }
}
