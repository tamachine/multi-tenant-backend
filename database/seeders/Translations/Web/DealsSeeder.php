<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class DealsSeeder extends Seeder
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
                'key' => 'deals.title',    
            ],
            [                
                'text' => ['en' => "Feel the best experience with our rental deals", "es" => "Vive la mejor experiencia con nuestras ofertas de alquiler"],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'deals.deal-title-1',    
            ],
            [                
                'text' => ['en' => "Deals for every budget", "es" => "Ofertas para todos los presupuestos"],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'deals.deal-text-1',    
            ],
            [                
                'text' => ['en' => "Choose from & wide variety of car classes new high-quality vehicles teeting your neads and luxigel best", "es" => "Elija entre una amplia variedad de clases de automóviles vehículos nuevos de alta calidad Neads y Luxigel mejor"],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'deals.deal-title-2',    
            ],
            [                
                'text' => ['en' => "Awesome Customer Support", "es" => "Impresionante atención al cliente"],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'deals.deal-text-2',    
            ],
            [                
                'text' => ['en' => "Deliver faster, more personalized support with the power of co browse and live chat.", "es" => "Ofrezca un soporte más rápido y personalizado con el poder de la navegación compartida y el chat en vivo."],
            ]
        );  


        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'deals.deal-title-3',    
            ],
            [                
                'text' => ['en' => "Free Cancellation", "es" => "Cancelación gratuita"],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'deals.deal-text-3',    
            ],
            [                
                'text' => ['en' => "No extra fee, you can cancel your booking anytime", "es" => "Sin cargo adicional, puede cancelar su reserva en cualquier momento"],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'deals.deal-title-4',    
            ],
            [                
                'text' => ['en' => "Your Best security", "es" => "Tu mejor seguridad"],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'deals.deal-text-4',    
            ],
            [                
                'text' => ['en' => "Every detail that is part of our service has been created with your safety in mind", "es" => "Cada detalle que forma parte de nuestro servicio tiene ha sido creado pensando en su seguridad"],
            ]
        );

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'deals.deal-title-5',    
            ],
            [                
                'text' => ['en' => "Quality Drivers", "es" => "Conductores de calidad"],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'deals.deal-text-5',    
            ],
            [                
                'text' => ['en' => "We have the most rigorous driver selection process in the market. We work only with the best.", "es" => "Contamos con el proceso de selección de conductores más riguroso del mercado. Trabajamos solo con los mejores."],
            ]
        );       
    }
}
