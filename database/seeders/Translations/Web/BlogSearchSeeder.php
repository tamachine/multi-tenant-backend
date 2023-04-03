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
                'text' => ['en' => 'Accidents and incidents can never be predicted, which is why it is important to be insured against most eventualities.', 'es' => 'Los accidentes e incidentes nunca se pueden predecir, por lo que es importante estar asegurado contra la mayoría de las eventualidades.'],
            ]
        );   

        
    }
}
