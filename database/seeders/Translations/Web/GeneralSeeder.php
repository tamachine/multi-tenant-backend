<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class GeneralSeeder extends Seeder
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
                'key' => 'general.brand',    
            ],
            [                
                'text' => ['en' => 'Reykjavik Auto', 'es' => 'Reykjavik Auto'],
            ]
        );    
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.search',    
            ],
            [                
                'text' => ['en' => 'Search', 'es' => 'Buscar'],
            ]
        );    
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.read-more',    
            ],
            [                
                'text' => ['en' => 'Read more', 'es' => 'Leer más'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.after-meridiem',    
            ],
            [                
                'text' => ['en' => 'AM', 'es' => 'AM'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.post-meridiem',    
            ],
            [                
                'text' => ['en' => 'PM', 'es' => 'PM'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-en',    
            ],
            [                
                'text' => ['en' => 'English', 'es' => 'Inglés'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-es',    
            ],
            [                
                'text' => ['en' => 'Spanish', 'es' => 'Español'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-de',    
            ],
            [                
                'text' => ['en' => 'Deutch', 'es' => 'Alemán'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-fr',    
            ],
            [                
                'text' => ['en' => 'Français', 'es' => 'Francés'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-da',    
            ],
            [                
                'text' => ['en' => 'Dansk', 'es' => 'Danés'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-it',    
            ],
            [                
                'text' => ['en' => 'Italian', 'es' => 'Italiano'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-remember',    
            ],
            [                
                'text' => ['en' => 'Remember that the final transaction will be made in ISK', 'es' => 'Recuerda que la transacción final se realizará en ISK'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-language',    
            ],
            [                
                'text' => ['en' => 'Select language', 'es' => 'Selecciona idioma'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-currency',    
            ],
            [                
                'text' => ['en' => 'Select currency', 'es' => 'Selecciona moneda'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-apply',    
            ],
            [                
                'text' => ['en' => 'Change settings', 'es' => 'Cambiar opciones'],
            ]
        );  
    }
}
