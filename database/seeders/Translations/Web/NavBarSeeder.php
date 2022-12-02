<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class NavBarSeeder extends Seeder
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
                'key' => 'navbar.cars',    
            ],
            [                
                'text' => ['en' => 'Cars', 'es' => 'Flota'],
            ]
        );   
        
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.about',    
            ],
            [                
                'text' => ['en' => 'About us', 'es' => 'Sobre nosotros'],
            ]
        );

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.faq',    
            ],
            [                
                'text' => ['en' => 'FAQ', 'es' => 'FAQ'],
            ]
        );

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.blog',    
            ],
            [                
                'text' => ['en' => 'Blog', 'es' => 'Blog'],
            ]
        );

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.contact',    
            ],
            [                
                'text' => ['en' => 'Contact', 'es' => 'Contacto'],
            ]
        );

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.en',    
            ],
            [                
                'text' => ['en' => 'ENG', 'es' => 'ENG'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.es',    
            ],
            [                
                'text' => ['en' => 'ES', 'es' => 'ES'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.close',    
            ],
            [                
                'text' => ['en' => 'close', 'es' => 'cerrar'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.open',    
            ],
            [                
                'text' => ['en' => 'menu', 'es' => 'menu'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.email',    
            ],
            [                
                'text' => ['en' => 'info@reykjavikauto.com', 'es' => 'info@reykjavikauto.com'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.cars-title',    
            ],
            [                
                'text' => ['en' => 'Pay only 15% now', 'es' => 'Paga solo el 15% ahora'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.cars-button',    
            ],
            [                
                'text' => ['en' => 'View all cars', 'es' => 'Todos los coches'],
            ]
        );  

        
    }
}
