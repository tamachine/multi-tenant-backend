<?php

namespace Database\Seeders\IcelandCars\Translations\Web;

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
                'key' => 'blog/post/{blog_post_slug}',
            ],
            [
                'text' => ['en' => 'blog/post/{blog_post_slug}', 'es' => 'blog/post/{blog_post_slug}'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'blog/preview/{blog_post_slug}',
            ],
            [
                'text' => ['en' => 'blog/preview/{blog_post_slug}', 'es' => 'blog/previsualización/{blog_post_slug}'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'blog/search',
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
                'key' => 'blog/tag/{blog_tag_slug}',
            ],
            [
                'text' => ['en' => 'blog/tag/{blog_tag_slug}', 'es' => 'blog/tag/{blog_tag_slug}'],
            ]
        );     


        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'blog/author/{blog_author_slug}',
            ],
            [
                'text' => ['en' => 'blog/author/{blog_author_slug}', 'es' => 'blog/autor/{blog_author_slug}'],
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
                'key' => 'cancellation-policy',
            ],
            [
                'text' => ['en' => 'cancellation-policy', 'es' => 'politica-de-cancelacion'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'privacy-and-cookie-policy',
            ],
            [
                'text' => ['en' => 'privacy-and-cookie-policy', 'es' => 'privacidad-y-politica-de-cookies'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'routes.legal-notice',
            ],
            [
                'text' => ['en' => 'legal-notice', 'es' => 'nota-legal'],
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

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => '{car_hashid}/insurances',
            ],
            [
                'text' => ['en' => '{car_hashid}/insurances', 'es' => '{car_hashid}/seguros'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => '{car_hashid}/extras',
            ],
            [
                'text' => ['en' => '{car_hashid}/extras', 'es' => '{car_hashid}/extras'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => '{car_hashid}/summary',
            ],
            [
                'text' => ['en' => '{car_hashid}/summary', 'es' => '{car_hashid}/sumario'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'cars/small-medium',
            ],
            [
                'text' => ['en' => 'cars/small-medium', 'es' => 'flota/medianos'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'cars/large',
            ],
            [
                'text' => ['en' => 'cars/large', 'es' => 'flota/large'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'cars/premium',
            ],
            [
                'text' => ['en' => 'cars/premium', 'es' => 'flota/premium'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'insurances/landing',
            ],
            [
                'text' => ['en' => 'insurances', 'es' => 'seguros'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'blog/all',
            ],
            [
                'text' => ['en' => 'blog/articles', 'es' => 'blog/articulos'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'routes',
                'key' => 'blog/top-10',
            ],
            [
                'text' => ['en' => 'blog/top', 'es' => 'blog/mejores'],
            ]
        );
       
    }
}
