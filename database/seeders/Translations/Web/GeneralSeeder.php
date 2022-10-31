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
                'text' => ['en' => 'Reykjavic Auto', 'es' => 'Reykjavic Auto'],
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
    }
}
