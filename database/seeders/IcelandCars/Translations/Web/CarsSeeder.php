<?php

namespace Database\Seeders\IcelandCars\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class CarsSeeder extends Seeder
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
                'group' => 'cars',
                'key' => 'title',    
            ],
            [                
                'text' => ['en' => 'Browse through all of our available vehicles', 'es' => 'Navega a través de todos nuestros vehículos disponibles'],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'subtitle',    
            ],
            [                
                'text' => ['en' => 'The fleet guide below provides an indication of the size and style of car available for each car group. <br>Please note that reservations can only be made by car group and are subject to availability.', 'es' => 'La siguiente guía de flotas proporciona una indicación del tamaño y estilo del automóvil disponible para cada grupo de automóviles. <br>Tenga en cuenta que las reservas solo se pueden hacer por grupo de vehículos y están sujetas a disponibilidad.'],
                'rich' => true,
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-all',    
            ],
            [                
                'text' => ['en' => 'All', 'es' => 'Todos'],                
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-transmission',    
            ],
            [                
                'text' => ['en' => 'Transmission', 'es' => 'Transmisión'],                
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'filters-transmission-automatic',    
            ],
            [                
                'text' => ['en' => 'Automatic', 'es' => 'Automático'],                
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'filters-transmission-manual',    
            ],
            [                
                'text' => ['en' => 'Manual', 'es' => 'Manual'],                
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-road',    
            ],
            [                
                'text' => ['en' => 'Type of used', 'es' => 'Tipo de uso'],                
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'filters-road-4wd',    
            ],
            [                
                'text' => ['en' => '4wd', 'es' => '4wd'],                
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'filters-road-fwd',    
            ],
            [                
                'text' => ['en' => 'fwd', 'es' => 'fwd'],                
            ]
        );  
            
        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-seat',    
            ],
            [                
                'text' => ['en' => 'Seats', 'es' => 'Plazas'],                
            ]
        );   

        for($x=2; $x<=12; $x++) {
            Translation::firstOrCreate(
                [
                    'group' => 'cars',
                    'key' => 'filters-seat-'.$x,    
                ],
                [                
                    'text' => ['en' => $x, 'es' => $x],                
                ]
            );  
        }

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-engine',    
            ],
            [                
                'text' => ['en' => 'Fuel type', 'es' => 'Combustible'],                
            ]
        );  
        
        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-engine-gas',    
            ],
            [                
                'text' => ['en' => 'Gas', 'es' => 'Gasolina'],                
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-engine-diesel',    
            ],
            [                
                'text' => ['en' => 'Diesel', 'es' => 'Diésel'],                
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-engine-electric',    
            ],
            [                
                'text' => ['en' => 'Electric', 'es' => 'Eléctrico'],                
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-type-medium',    
            ],
            [                
                'text' => ['en' => 'Small - Medium', 'es' => 'Pequeño - Mediano'],                
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-type-large',    
            ],
            [                
                'text' => ['en' => 'Large', 'es' => 'Large'],                
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-type-4x4',    
            ],
            [                
                'text' => ['en' => '4x4', 'es' => '4x4'],                
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-type-premium',    
            ],
            [                
                'text' => ['en' => 'Premium', 'es' => 'Premium'],                
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'filters-type-minivans',    
            ],
            [                
                'text' => ['en' => 'Mini vans', 'es' => 'Mini vans'],                
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'card-quick-look',    
            ],
            [                
                'text' => ['en' => 'Quick look', 'es' => 'Vistazo rápido'],                
            ]
        );     
        
        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'card-seats',    
            ],
            [                
                'text' => ['en' => 'Seats', 'es' => 'Plazas'],                
            ]
        );    
        
        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'card-f-road-allowed',    
            ],
            [                
                'text' => ['en' => 'F-Road permitidas', 'es' => 'F-Road no permitidas'],                
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'card-f-road-not-allowed',    
            ],
            [                
                'text' => ['en' => 'F-Road not allowed', 'es' => 'F-Road no permitidas'],                
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'card-engine-gas',    
            ],
            [                
                'text' => ['en' => 'Gas', 'es' => 'Gasolina'],                
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'card-engine-diesel',    
            ],
            [                
                'text' => ['en' => 'Diesel', 'es' => 'Diésel'],                
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key' => 'card-engine-electric',    
            ],
            [                
                'text' => ['en' => 'Electric', 'es' => 'Eléctrico'],                
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'card-transmission-auto',    
            ],
            [                
                'text' => ['en' => 'Automatic', 'es' => 'Automático'],                
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'card-transmission-manual',    
            ],
            [                
                'text' => ['en' => 'Manual', 'es' => 'Manual'],                
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'card-transmission-automatic',    
            ],
            [                
                'text' => ['en' => 'Automatic', 'es' => 'Automático'],                
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'card-features',    
            ],
            [                
                'text' => ['en' => 'Features', 'es' => 'Cracterísticas'],                
            ]
        ); 
        
        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'card-price-start',    
            ],
            [                
                'text' => ['en' => 'Starting at', 'es' => 'Desde'],                
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'card-perday',    
            ],
            [                
                'text' => ['en' => '/day', 'es' => '/día'],                
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'card-button',    
            ],
            [                
                'text' => ['en' => 'Book now', 'es' => 'Reserva'],                
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'cars',
                'key'   => 'search-not-found',    
            ],
            [                
                'text' => ['en' => 'No cars were found', 'es' => 'No se encontraron coches'],                
            ]
        ); 
       
    }
}
