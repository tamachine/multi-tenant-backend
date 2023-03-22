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
                'key' => 'read-more',
            ],
            [
                'text' => ['en' => 'Read more', 'es' => 'Leer más'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'blog',
                'key' => 'view-by-category',
            ],
            [
                'text' => ['en' => 'View by category', 'es' => 'Ver por categoría'],
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
    }
}
