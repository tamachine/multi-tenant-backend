<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class BlogSearchSeeder extends Seeder
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
                'group' => 'blog-search',
                'key' => 'search-title',
            ],
            [
                'text' => ['en' => 'Search', 'es' => 'Búsqueda'],
            ]
        );        

        Translation::firstOrCreate(
            [
                'group' => 'blog-search',
                'key' => 'breadcrumb',
            ],
            [
                'text' => ['en' => 'Search', 'es' => 'Búsqueda'],
            ]
        );      
        
        Translation::firstOrCreate(
            [
                'group' => 'blog-search',
                'key' => 'input',
            ],
            [
                'text' => ['en' => 'Search for an article', 'es' => 'Busca un artículo'],
            ]
        );    

        Translation::firstOrCreate(
            [
                'group' => 'blog-search',
                'key' => 'category-subtitle',
            ],
            [
                'text' => ['en' => 'Accidents and incidents can never be predicted, which is why it is important to be insured against most eventualities.', 'es' => 'Los accidentes e incidentes nunca se pueden predecir, por lo que es importante estar asegurado contra la mayorÃ­a de las eventualidades.'],                
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'blog-search',
                'key' => 'all-title',
            ],
            [
                'text' => ['en' => 'Articles', 'es' => 'Artículos'],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'blog-search',
                'key' => 'all-subtitle',
            ],
            [
                'text' => ['en' => 'Explore our posts', 'es' => 'Explora nuestros artículos'],
            ]
        );        

        Translation::firstOrCreate(
            [
                'group' => 'blog-search',
                'key' => 'all-breadcrumb',
            ],
            [
                'text' => ['en' => 'Posts', 'es' => 'Artículos'],
            ]
        );      
        
        Translation::firstOrCreate(
            [
                'group' => 'blog-search',
                'key' => 'top10-title',
            ],
            [
                'text' => ['en' => 'Top 10 posts', 'es' => 'Los 10 mejores artículos'],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'blog-search',
                'key' => 'top10-subtitle',
            ],
            [
                'text' => ['en' => 'Explore our top 10 posts', 'es' => 'Explora nuestros 10 mejores artículos'],
            ]
        );        

        Translation::firstOrCreate(
            [
                'group' => 'blog-search',
                'key' => 'top10-breadcrumb',
            ],
            [
                'text' => ['en' => 'Top 10', 'es' => 'Los 10 mejores'],
            ]
        );  
        
    }
}
