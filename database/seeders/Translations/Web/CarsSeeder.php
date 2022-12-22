<?php

namespace Database\Seeders\Translations\Web;

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
                'key'   => 'filters-transmission-auto',    
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
                       
    }
}
