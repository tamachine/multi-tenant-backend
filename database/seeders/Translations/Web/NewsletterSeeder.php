<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class NewsletterSeeder extends Seeder
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
                'group' => 'newsletter',
                'key' => 'title',
            ],
            [
                'text' => ['en' => 'Iceland guides and secret locations right in your inbox', 'es' => 'Guías de Islandia y lugares secretos directamente en tu bandeja de entrada'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'newsletter',
                'key' => 'text',
            ],
            [
                'text' => ['en' => 'Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqut enim ad minim ', 'es' => 'Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqut enim ad minim '],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'newsletter',
                'key' => 'placeholder',
            ],
            [
                'text' => ['en' => 'Your email address...', 'es' => 'Tu email...'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'newsletter',
                'key' => 'subscribe',
            ],
            [
                'text' => ['en' => 'Subscribe', 'es' => 'Suscribir'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'newsletter',
                'key' => 'subscribed',
            ],
            [
                'text' => ['en' => 'Thank you for subscribing to our newsletter', 'es' => 'Gracias por suscribirte a nuestro newsletter'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'newsletter',
                'key' => 'email_sent-title',
            ],
            [
                'text' => ['en' => 'Message received!', 'es' => 'Mensaje recibido!'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'newsletter',
                'key' => 'email_sent-text',
            ],
            [
                'text' => ['en' => 'Thank you, your message has been sent', 'es' => 'Gracias, tu mensaje se ha enviado'],
            ]
        );       

    }
}
