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
                'key' => 'mobile-default-title',    
            ],
            [                
                'text' => ['en' => 'Default Pick & Return<br>Time and location', 'es' => 'Horario y localización por defecto'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-default-times-title',    
            ],
            [                
                'text' => ['en' => 'Pick & Return Time', 'es' => 'Horario recogida y devolución'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-default-location-airport',    
            ],
            [                
                'text' => ['en' => 'Airport', 'es' => 'Aeropuerto'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-default-location-title',    
            ],
            [                
                'text' => ['en' => 'Pick & Return Location', 'es' => 'Lugar recogida y devolución'],
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
                'key' => 'mobile-edit-button',    
            ],
            [                
                'text' => ['en' => 'Edit', 'es' => 'Editar'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'resume-start-title',    
            ],
            [                
                'text' => ['en' => 'Pick-Up', 'es' => 'Recogida'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'resume-end-title',    
            ],
            [                
                'text' => ['en' => 'Return', 'es' => 'Devolución'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-resume-title',    
            ],
            [                
                'text' => ['en' => 'Planning', 'es' => 'Resumen'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-dates-title',    
            ],
            [                
                'text' => ['en' => 'Travel Days', 'es' => 'Días de viaje'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-times-title',    
            ],
            [                
                'text' => ['en' => 'Select Time', 'es' => 'Selecciona horario'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'mobile-location-title',    
            ],
            [                
                'text' => ['en' => 'Location', 'es' => 'Localización'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'pick-up-location-placeholder',    
            ],
            [                
                'text' => ['en' => 'Keflavik Airport', 'es' => 'Aeropuerto Keflavik'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'car-search-bar',
                'key' => 'return-location-placeholder',    
            ],
            [                
                'text' => ['en' => 'Keflavik Airport', 'es' => 'Aeropuerto Keflavik'],
            ]
        );  
    }
}
