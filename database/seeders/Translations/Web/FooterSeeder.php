<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class FooterSeeder extends Seeder
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
                'group' => 'footer',
                'key' => 'title',    
            ],
            [                
                'text' => ['en' => 'Wherever you go, go with all your heart', 'es' => 'Donde quiera que vayas, ve con todo tu corazón'],
            ]
        );    
        
        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'text',    
            ],
            [                
                'text' => ['en' => 'For more than 9 years, we have been providing customers from all over the world with superb service, amazing offers and quality vehicles.', 'es' => 'Durante más de 9 años, hemos brindado a clientes de todo el mundo un excelente servicio, ofertas increíbles y vehículos de calidad.'],
            ]
        );  
        
        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'newsletter-title',    
            ],
            [                
                'text' => ['en' => 'Newsletter', 'es' => 'Newsletter'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'newsletter-text',    
            ],
            [                
                'text' => ['en' => 'Be the first one to get our Iceland top secret articles', 'es' => 'Sé el primero en recibir nuestros artículos top secret de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'newsletter-input-placeholder',    
            ],
            [                
                'text' => ['en' => 'Enter your email', 'es' => 'Introduce tu correo'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'newsletter-form-submit',    
            ],
            [                
                'text' => ['en' => 'Submit', 'es' => 'Enviar'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-1-links-title',    
            ],
            [                
                'text' => ['en' => 'Useful Links', 'es' => 'Enlaces útiles'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-2-links-title',    
            ],
            [                
                'text' => ['en' => 'Regions', 'es' => 'Regiones'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-3-links-title',    
            ],
            [                
                'text' => ['en' => 'Shortcuts', 'es' => 'Atajos'],
            ]
        );         

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-4-links-title',    
            ],
            [                
                'text' => ['en' => 'Privacy & Terms', 'es' => 'Privacidad y términos'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-1-link-1',    
            ],
            [                
                'text' => ['en' => 'Road Conditions', 'es' => 'Estado carreteras'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-1-link-2',    
            ],
            [                
                'text' => ['en' => 'Safe Travel', 'es' => 'Viaje seguro'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-1-link-3',    
            ],
            [                
                'text' => ['en' => 'Weather', 'es' => 'Tiempo'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-1-link-4',    
            ],
            [                
                'text' => ['en' => 'Car Rental Iceland', 'es' => 'Alquiler de coche en Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-1-link-5',    
            ],
            [                
                'text' => ['en' => 'Exchange Rate', 'es' => 'Tipo de cambio'],
            ]
        );         

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-2-link-1',    
            ],
            [                
                'text' => ['en' => 'South Iceland', 'es' => 'Sur de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-2-link-2',    
            ],
            [                
                'text' => ['en' => 'Visit Reykjavik', 'es' => 'Visita Reykjavik'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-2-link-3',    
            ],
            [                
                'text' => ['en' => 'North Iceland', 'es' => 'Norte de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-2-link-4',    
            ],
            [                
                'text' => ['en' => 'East Iceland', 'es' => 'Este de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-2-link-5',    
            ],
            [                
                'text' => ['en' => 'West Iceland', 'es' => 'Oeste de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-2-link-6',    
            ],
            [                
                'text' => ['en' => 'Westfjords', 'es' => 'Fiordos del oeste'],
            ]
        ); 


        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-3-link-1',    
            ],
            [                
                'text' => ['en' => 'Keflavik Airport', 'es' => 'Aeropuerto de Keflavik'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-3-link-2',    
            ],
            [                
                'text' => ['en' => 'Reykjavik Car Rental', 'es' => 'Alquiler de coches en Reykjavik'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-3-link-3',    
            ],
            [                
                'text' => ['en' => 'Location Voiture', 'es' => 'Ubicación'],
            ]
        ); 
       

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-4-link-1',    
            ],
            [                
                'text' => ['en' => 'Cancellation policy', 'es' => 'Política de cancelación'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-4-link-2',    
            ],
            [                
                'text' => ['en' => 'Terms and conditions', 'es' => 'Términos y condiciones'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-4-link-3',    
            ],
            [                
                'text' => ['en' => 'Privacy and Cookie Policy', 'es' => 'Privacidad y política de cookies'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'col-4-link-4',    
            ],
            [                
                'text' => ['en' => 'Legal Notice', 'es' => 'Aviso legal'],
            ]
        );         

        Translation::firstOrCreate(
            [
                'group' => 'footer',
                'key' => 'copyright',    
            ],
            [                
                'text' => ['en' => '&#169; 2022-2023 All Rights Reserved', 'es' => '&#169; 2022-2023 Todos los derechos reservados'],
            ]
        ); 
    }
}
