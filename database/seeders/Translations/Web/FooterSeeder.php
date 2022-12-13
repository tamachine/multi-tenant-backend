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
                'group' => 'web',
                'key' => 'footer.title',    
            ],
            [                
                'text' => ['en' => 'Wherever you go, go with all your heart', 'es' => 'Donde quiera que vayas, ve con todo tu corazón'],
            ]
        );    
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.text',    
            ],
            [                
                'text' => ['en' => 'For more than 9 years, we have been providing customers from all over the world with superb service, amazing offers and quality vehicles.', 'es' => 'Durante más de 9 años, hemos brindado a clientes de todo el mundo un excelente servicio, ofertas increíbles y vehículos de calidad.'],
            ]
        );  
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.newsletter-title',    
            ],
            [                
                'text' => ['en' => 'Newsletter', 'es' => 'Newsletter'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.newsletter-text',    
            ],
            [                
                'text' => ['en' => 'Be the first one to get our Iceland top secret articles', 'es' => 'Sé el primero en recibir nuestros artículos top secret de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.newsletter-input-placeholder',    
            ],
            [                
                'text' => ['en' => 'Enter your email', 'es' => 'Introduce tu correo'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.newsletter-form-submit',    
            ],
            [                
                'text' => ['en' => 'Submit', 'es' => 'Enviar'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-1-links-title',    
            ],
            [                
                'text' => ['en' => 'Useful Links', 'es' => 'Enlaces útiles'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-2-links-title',    
            ],
            [                
                'text' => ['en' => 'About Iceland', 'es' => 'Sobre Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-3-links-title',    
            ],
            [                
                'text' => ['en' => 'Regions', 'es' => 'Regiones'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-4-links-title',    
            ],
            [                
                'text' => ['en' => 'Shorcuts', 'es' => 'Atajos'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-1-link-1',    
            ],
            [                
                'text' => ['en' => 'Road Conditions', 'es' => 'Estado carreteras'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-1-link-2',    
            ],
            [                
                'text' => ['en' => 'Safe Travel', 'es' => 'Viaje seguro'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-1-link-3',    
            ],
            [                
                'text' => ['en' => 'Weather', 'es' => 'Tiempo'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-1-link-4',    
            ],
            [                
                'text' => ['en' => 'Car Rental Iceland', 'es' => 'Alquiler de coche en Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-1-link-5',    
            ],
            [                
                'text' => ['en' => 'Exchange Rate', 'es' => 'Tipo de cambio'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-2-link-1',    
            ],
            [                
                'text' => ['en' => 'Get to know Iceland', 'es' => 'Conoce Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-2-link-2',    
            ],
            [                
                'text' => ['en' => 'Facts and Figures', 'es' => 'Hechos y Cifras'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-2-link-3',    
            ],
            [                
                'text' => ['en' => 'Practical Information', 'es' => 'Información práctica'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-2-link-4',    
            ],
            [                
                'text' => ['en' => 'People and Language', 'es' => 'Gente e Idioma'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-2-link-5',    
            ],
            [                
                'text' => ['en' => 'Iceland safe place to visit', 'es' => 'Islandia un lugar seguro para visitar'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-3-link-1',    
            ],
            [                
                'text' => ['en' => 'South Iceland', 'es' => 'Sur de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-3-link-2',    
            ],
            [                
                'text' => ['en' => 'Visit Reykjavik', 'es' => 'Visita Reykjavik'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-3-link-3',    
            ],
            [                
                'text' => ['en' => 'North Iceland', 'es' => 'Norte de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-3-link-4',    
            ],
            [                
                'text' => ['en' => 'East Iceland', 'es' => 'Este de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-3-link-5',    
            ],
            [                
                'text' => ['en' => 'West Iceland', 'es' => 'Oeste de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-4-link-1',    
            ],
            [                
                'text' => ['en' => 'South Iceland', 'es' => 'Sur de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-4-link-2',    
            ],
            [                
                'text' => ['en' => 'Visit Reykjavik', 'es' => 'Visita Reykjavik'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-4-link-3',    
            ],
            [                
                'text' => ['en' => 'North Iceland', 'es' => 'Norte de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-4-link-4',    
            ],
            [                
                'text' => ['en' => 'East Iceland', 'es' => 'Este de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.col-4-link-5',    
            ],
            [                
                'text' => ['en' => 'West Iceland', 'es' => 'Oeste de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'footer.copyright',    
            ],
            [                
                'text' => ['en' => '&#169; 2022-2023 All Rights Reserved', 'es' => '&#169; 2022-2023 Todos los derechos reservados'],
            ]
        ); 
    }
}
