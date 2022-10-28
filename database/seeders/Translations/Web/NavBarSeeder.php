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
    }
}
