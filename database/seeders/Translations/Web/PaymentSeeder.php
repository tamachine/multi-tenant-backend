<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class PaymentSeeder extends Seeder
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
                'group' => 'payment',
                'key' => 'title',
            ],
            [
                'text' => ['en' => 'We will be with you during the entire trip', 'es' => 'Estaremos contigo durante todo el viaje'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'subtitle',
            ],
            [
                'text' => ['en' => 'Our five star customer service is 24h seven days a week available for you.', 'es' => 'Nuestro servicio de atención al cliente de cinco estrellas está disponible las 24 horas, los siete días de la semana.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'personal-information',
            ],
            [
                'text' => ['en' => 'Personal information', 'es' => 'Información personal'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'personal-info',
            ],
            [
                'text' => ['en' => 'Personal info', 'es' => 'Información personal'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'first-name',
            ],
            [
                'text' => ['en' => 'First name', 'es' => 'Nombre'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'last-name',
            ],
            [
                'text' => ['en' => 'Last name', 'es' => 'Apellido(s)'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'name',
            ],
            [
                'text' => ['en' => 'Name', 'es' => 'Nombre'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'email',
            ],
            [
                'text' => ['en' => 'Email', 'es' => 'Email'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'email-confirmation',
            ],
            [
                'text' => ['en' => 'Email confirmation', 'es' => 'Confirmar email'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'telephone',
            ],
            [
                'text' => ['en' => 'Phone number', 'es' => 'Teléfono'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'address',
            ],
            [
                'text' => ['en' => 'Address', 'es' => 'Dirección'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'your-address',
            ],
            [
                'text' => ['en' => 'Your address', 'es' => 'Su dirección'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'postal-code',
            ],
            [
                'text' => ['en' => 'Zip code', 'es' => 'Código postal'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'city',
            ],
            [
                'text' => ['en' => 'City', 'es' => 'Ciudad'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'country',
            ],
            [
                'text' => ['en' => 'Country', 'es' => 'País'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'payment-details',
            ],
            [
                'text' => ['en' => 'Payment details', 'es' => 'Detalles de pago'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'card-number',
            ],
            [
                'text' => ['en' => 'Number', 'es' => 'Número'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'card-name',
            ],
            [
                'text' => ['en' => 'Full name', 'es' => 'Nombre completo'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'card-month',
            ],
            [
                'text' => ['en' => 'Month', 'es' => 'Mes'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'card-year',
            ],
            [
                'text' => ['en' => 'Year', 'es' => 'Año'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'card-csv',
            ],
            [
                'text' => ['en' => 'CSV', 'es' => 'CSV'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'additional-information',
            ],
            [
                'text' => ['en' => 'Additional information', 'es' => 'Información adicional'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'add-your-message',
            ],
            [
                'text' => ['en' => 'Add your message', 'es' => 'Añade un mensaje'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'i-agree',
            ],
            [
                'text' => ['en' => 'I agree with this information,', 'es' => 'Estoy de acuerdo con esta información,'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 't-and-c',
            ],
            [
                'text' => ['en' => 'terms and conditions', 'es' => 'términos y condiciones'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'payment',
                'key' => 'payment-info',
            ],
            [
                'text' => ['en' => 'Payment info', 'es' => 'Información del pago'],
            ]
        );
    }
}
