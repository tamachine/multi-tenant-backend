<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class NavBarSeeder extends Seeder
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
                'key' => 'navbar.cars',    
            ],
            [                
                'text' => ['en' => 'Cars', 'es' => 'Flota'],
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.about',    
            ],
            [                
                'text' => ['en' => 'About us', 'es' => 'Sobre nosotros'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.faq',    
            ],
            [                
                'text' => ['en' => 'FAQ', 'es' => 'FAQ'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.blog',    
            ],
            [                
                'text' => ['en' => 'Blog', 'es' => 'Blog'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.contact',    
            ],
            [                
                'text' => ['en' => 'Contact', 'es' => 'Contacto'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.en',    
            ],
            [                
                'text' => ['en' => 'ENG', 'es' => 'ENG'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.es',    
            ],
            [                
                'text' => ['en' => 'ES', 'es' => 'ES'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.close',    
            ],
            [                
                'text' => ['en' => 'close', 'es' => 'cerrar'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.open',    
            ],
            [                
                'text' => ['en' => 'menu', 'es' => 'menu'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.email',    
            ],
            [                
                'text' => ['en' => 'info@reykjavikauto.com', 'es' => 'info@reykjavikauto.com'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'navbar.cars-title',    
            ],
            [                
                'text' => ['en' => 'Pay only 15% now', 'es' => 'Paga solo el 15% ahora'],
            ]
        );  

        Translation::firstOrCreate(
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
