<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class ContactSeeder extends Seeder
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
                'group' => 'contact',
                'key' => 'title',
            ],
            [
                'text' => ['en' => 'We are just one click away', 'es' => 'Estamos a un click de distancia'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'subtitle',
            ],
            [
                'text' => ['en' => 'Our five star customer service is 24h seven days a week available for you.', 'es' => 'Nuestro servicio de atención al cliente de cinco estrellas está a su disposición las 24 horas del día, los siete días de la semana.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'name',
            ],
            [
                'text' => ['en' => 'Name', 'es' => 'Nombre'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'email',
            ],
            [
                'text' => ['en' => 'Email addresss', 'es' => 'Email'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'subject',
            ],
            [
                'text' => ['en' => 'Subject', 'es' => 'Asunto'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'enquiry_type',
            ],
            [
                'text' => ['en' => 'Enquiry type', 'es' => 'Tipo de consulta'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'enquiry_general',
            ],
            [
                'text' => ['en' => 'General', 'es' => 'General'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'enquiry_bookings',
            ],
            [
                'text' => ['en' => 'Bookings', 'es' => 'Reservas'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'message',
            ],
            [
                'text' => ['en' => 'Message', 'es' => 'Mensaje'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'submit',
            ],
            [
                'text' => ['en' => 'Submit', 'es' => 'Enviar'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'message_sent',
            ],
            [
                'text' => ['en' => 'Thank you, your message has been sent', 'es' => 'Gracias, tu mensaje se ha enviado'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'newsletter_title',
            ],
            [
                'text' => ['en' => 'Iceland guides and secret locations right in your inbox', 'es' => 'Guías de Islandia y lugares secretos directamente en tu bandeja de entrada'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'newsletter_text',
            ],
            [
                'text' => ['en' => 'Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqut enim ad minim ', 'es' => 'Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqut enim ad minim '],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'newsletter_placeholder',
            ],
            [
                'text' => ['en' => 'Your email address...', 'es' => 'Tu email...'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'newsletter_subscribe',
            ],
            [
                'text' => ['en' => 'Subscribe', 'es' => 'Suscribir'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'newsletter_subscribed',
            ],
            [
                'text' => ['en' => 'Thank you for subscribing to our newsletter', 'es' => 'Gracias por suscribirte a nuestro newsletter'],
            ]
        );
    }
}
