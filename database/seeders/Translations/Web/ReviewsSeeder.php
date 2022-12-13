<?php

namespace Database\Seeders\Translations\Web;

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
                'group' => 'web',
                'key' => 'reviews.award',    
            ],
            [                
                'text' => ['en' => 'Award', 'es' => 'Premio'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'reviews.24-support',    
            ],
            [                
                'text' => ['en' => '24h support', 'es' => 'Soporte 24h'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'reviews.of',    
            ],
            [                
                'text' => ['en' => 'of', 'es' => 'de'],
            ]
        );  

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'reviews.reviews',    
            ],
            [                
                'text' => ['en' => 'Reviews', 'es' => 'Opiniones'],
            ]
        );  
    }
}
