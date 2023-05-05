<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class UrlsSeeder extends Seeder
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
                'group' => 'routes',
                'key' => 'about',
            ],
            [
                'text' => ['en' => 'about-us', 'es' => 'sobre-nosotros'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'cars',
            ],
            [
                'text' => ['en' => 'cars', 'es' => 'flota'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'faq',
            ],
            [
                'text' => ['en' => 'faq', 'es' => 'faq'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'blog',
            ],
            [
                'text' => ['en' => 'blog', 'es' => 'blog'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'blog-post-{blog_post_slug}',
            ],
            [
                'text' => ['en' => 'blog/post/{blog_post_slug}', 'es' => 'blog/post/{blog_post_slug}'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'blog-preview-{blog_post_slug}',
            ],
            [
                'text' => ['en' => 'blog/preview/{blog_post_slug}', 'es' => 'blog/previsualización/{blog_post_slug}'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'blog-search',
            ],
            [
                'text' => ['en' => 'blog/search', 'es' => 'blog/busqueda'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'blog/category/{blog_category_slug}',
            ],
            [
                'text' => ['en' => 'blog/category/{blog_category_slug}', 'es' => 'blog/categoria/{blog_category_slug}'],
            ]
        );        

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'contact',
            ],
            [
                'text' => ['en' => 'contact', 'es' => 'contacto'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'terms-and-conditions',
            ],
            [
                'text' => ['en' => 'terms-and-conditions', 'es' => 'terminos-y-condiciones'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'payment',
            ],
            [
                'text' => ['en' => 'payment', 'es' => 'pago'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'success',
            ],
            [
                'text' => ['en' => 'success', 'es' => 'confirmacion'],
            ]
        );
       
    }
}
