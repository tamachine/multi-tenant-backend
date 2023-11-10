<?php

namespace Database\Seeders\MotorhomeIceland\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class ReviewsSeeder extends Seeder
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
                'group' => 'reviews',
                'key' => 'award',    
                'rich' => true,
            ],
            [                
                'text' => ['en' => 'Outstanding <br>Company 2021', 'es' => 'Empresa <br>Destacada 2021'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'reviews',
                'key' => '24-support',    
            ],
            [                
                'text' => ['en' => '24h support', 'es' => 'Soporte 24h'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'reviews',
                'key' => 'of',    
            ],
            [                
                'text' => ['en' => 'of', 'es' => 'de'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'reviews',
                'key' => 'reviews',    
            ],
            [                
                'text' => ['en' => 'Reviews', 'es' => 'Opiniones'],
            ]
        );  
    }
}
