<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class GeneralSeeder extends Seeder
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
                'key' => 'general.brand',    
            ],
            [                
                'text' => ['en' => 'Reykjavik Auto', 'es' => 'Reykjavik Auto'],
            ]
        );    
        
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.search',    
            ],
            [                
                'text' => ['en' => 'Search', 'es' => 'Buscar'],
            ]
        );    
        
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.read-more',    
            ],
            [                
                'text' => ['en' => 'Read more', 'es' => 'Leer más'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.after-meridiem',    
            ],
            [                
                'text' => ['en' => 'AM', 'es' => 'AM'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.post-meridiem',    
            ],
            [                
                'text' => ['en' => 'PM', 'es' => 'PM'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-en',    
            ],
            [                
                'text' => ['en' => 'English', 'es' => 'Inglés'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-es',    
            ],
            [                
                'text' => ['en' => 'Spanish', 'es' => 'Español'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-de',    
            ],
            [                
                'text' => ['en' => 'Deutch', 'es' => 'Alemán'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-fr',    
            ],
            [                
                'text' => ['en' => 'Français', 'es' => 'Francés'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-da',    
            ],
            [                
                'text' => ['en' => 'Dansk', 'es' => 'Danés'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-it',    
            ],
            [                
                'text' => ['en' => 'Italian', 'es' => 'Italiano'],
            ]
        );  

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'general.languages-remember',    
            ],
            [                
                'text' => ['en' => 'Remember that the final transaction will be made in ISK', 'es' => 'Recuerda que la transacción final se realizará en ISK'],
            ]
        );  
    }
}
