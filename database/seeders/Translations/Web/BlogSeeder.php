<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class BlogSeeder extends Seeder
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
                'group' => 'blog',
                'key' => 'by',
            ],
            [
                'text' => ['en' => 'By', 'es' => 'Por'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'in',
            ],
            [
                'text' => ['en' => 'in', 'es' => 'en'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'read-more',
            ],
            [
                'text' => ['en' => 'Read more', 'es' => 'Leer más'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'view-by-tag'
            ],
            [
                'text' => ['en' => 'View by tag', 'es' => 'Ver por tag'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'latest',
            ],
            [
                'text' => ['en' => 'Latest articles', 'es' => 'Últimos artículos'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'top-10',
            ],
            [
                'text' => ['en' => 'Top 10 must read', 'es' => 'Los 10 mejores'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'view-all-btn',
            ],
            [
                'text' => ['en' => 'View all', 'es' => 'Ver todos'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'time',
            ],
            [
                'text' => ['en' => '2 Minutes', 'es' => '2 Minutos'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'latest-articles-title',
            ],
            [
                'text' => ['en' => 'Explore our latest articles', 'es' => 'Explora nuestros últimos artículos'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'related-posts-title',
            ],
            [
                'text' => ['en' => 'You may also like', 'es' => 'Te puede interesar'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'related-posts-subtitle',
            ],
            [
                'text' => ['en' => 'Blog articles related by tags and category', 'es' => 'Artículos relaciones por tags y categorís'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'pagination-btn',
            ],
            [
                'text' => ['en' => 'Go to article', 'es' => 'Ir al artículo'],
            ]
        );
    }
}
