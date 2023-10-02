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
                'key' => 'enquiry_amendments on my booking',
            ],
            [
                'text' => ['en' => 'Amendments on my booking', 'es' => 'Modificaciones en mi reserva'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'enquiry_booking cancellation',
            ],
            [
                'text' => ['en' => 'Booking cancellation', 'es' => 'Cancelación de reserva'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'enquiry_make a new booking / Get a quote',
            ],
            [
                'text' => ['en' => 'Make a new booking / Get a quote', 'es' => 'Hacer una nueva reserva/ obtener un presupuesto'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'enquiry_road assistance and travel support',
            ],
            [
                'text' => ['en' => 'Road assistance and travel support', 'es' => 'Asistencia en carretera y apoyo en viaje'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'enquiry_insurance information',
            ],
            [
                'text' => ['en' => 'Insurance information', 'es' => 'Información del seguro'],
            ]
        );
        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'enquiry_pick up or drop off information',
            ],
            [
                'text' => ['en' => 'Pick up or drop off information', 'es' => 'Recoger o dejar información'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'enquiry_other',
            ],
            [
                'text' => ['en' => 'Other', 'es' => 'Otro'],
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
                'text' => ['en' => 'Send', 'es' => 'Enviar'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'message_sent-title',
            ],
            [
                'text' => ['en' => 'Message received!', 'es' => 'Mensaje recibido!'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'contact',
                'key' => 'message_sent-text',
            ],
            [
                'text' => ['en' => 'Thank you, your message has been sent', 'es' => 'Gracias, tu mensaje se ha enviado'],
            ]
        );       
    }
}
