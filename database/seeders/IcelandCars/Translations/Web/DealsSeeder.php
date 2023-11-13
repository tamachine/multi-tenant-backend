<?php

namespace Database\Seeders\IcelandCars\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class DealsSeeder extends Seeder
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
                'group' => 'deals',
                'key' => 'title',    
            ],
            [                
                'text' => ['en' => "Feel the best experience with our rental deals", "es" => "Vive la mejor experiencia con nuestras ofertas de alquiler"],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'deals',
                'key' => 'deal-title-1',    
            ],
            [                
                'text' => ['en' => "Deals for every budget", "es" => "Ofertas para todos los presupuestos"],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'deals',
                'key' => 'deal-text-1',    
            ],
            [                
                'text' => ['en' => "Choose from & wide variety of car classes new high-quality vehicles teeting your neads and luxigel best", "es" => "Elija entre una amplia variedad de clases de automóviles vehículos nuevos de alta calidad Neads y Luxigel mejor"],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'deals',
                'key' => 'deal-title-2',    
            ],
            [                
                'text' => ['en' => "Awesome Customer Support", "es" => "Impresionante atención al cliente"],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'deals',
                'key' => 'deal-text-2',    
            ],
            [                
                'text' => ['en' => "Deliver faster, more personalized support with the power of co browse and live chat.", "es" => "Ofrezca un soporte más rápido y personalizado con el poder de la navegación compartida y el chat en vivo."],
            ]
        );  


        Translation::firstOrCreate(
            [
                'group' => 'deals',
                'key' => 'deal-title-3',    
            ],
            [                
                'text' => ['en' => "Free Cancellation", "es" => "Cancelación gratuita"],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'deals',
                'key' => 'deal-text-3',    
            ],
            [                
                'text' => ['en' => "No extra fee, you can cancel your booking anytime", "es" => "Sin cargo adicional, puede cancelar su reserva en cualquier momento"],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'deals',
                'key' => 'deal-title-4',    
            ],
            [                
                'text' => ['en' => "Your Best security", "es" => "Tu mejor seguridad"],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'deals',
                'key' => 'deal-text-4',    
            ],
            [                
                'text' => ['en' => "Every detail that is part of our service has been created with your safety in mind", "es" => "Cada detalle que forma parte de nuestro servicio tiene ha sido creado pensando en su seguridad"],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'deals',
                'key' => 'deal-title-5',    
            ],
            [                
                'text' => ['en' => "Quality Drivers", "es" => "Conductores de calidad"],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'deals',
                'key' => 'deal-text-5',    
            ],
            [                
                'text' => ['en' => "We have the most rigorous driver selection process in the market. We work only with the best.", "es" => "Contamos con el proceso de selección de conductores más riguroso del mercado. Trabajamos solo con los mejores."],
            ]
        );       
    }
}
