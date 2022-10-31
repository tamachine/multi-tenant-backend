<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {                
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.title',    
            ],
            [                
                'text' => ['en' => 'A road ready for you', 'es' => 'Un camino listo para ti'],
            ]
        );   
        
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.subtitle',    
            ],
            [                
                'text' => ['en' => 'The best car rental in Iceland', 'es' => 'El mejor alquiler de coches en Islandia'],
            ]
        );   
        
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.box1-h2-title',    
            ],
            [                
                'text' => ['en' => 'Best way to find your perfect car in Iceland', 'es' => 'La mejor forma de encontrar el coche perfecto en Islandia'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.box1-h2-subtitle',    
            ],
            [                
                'text' => ['en' => 'We are locals and treat each customer to our acquired expertise and knowledge that is unsurpassed by any other car rental in Iceland.', 'es' => 'Somos locales y tratamos a cada cliente con nuestra experiencia y conocimiento adquiridos que no tienen comparación con ningún otro alquiler de autos en Islandia.'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-1-title',    
            ],
            [                
                'text' => ['en' => '+30 Premium cars', 'es' => '+30 Coches premium'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-1-text',    
            ],
            [                
                'text' => ['en' => "We have a grand selection of high quality vehicles for your next trip to Iceland. Depending on your type of trip whether you're here on business or for pleasure—we've got you covered!", 'es' => "Tenemos una gran selección de vehículos de alta calidad para su próximo viaje a Islandia. Dependiendo de su tipo de viaje, ya sea que esté aquí por negocios o por placer, ¡lo tenemos cubierto!"],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-2-title',    
            ],
            [                
                'text' => ['en' => '+10000 Customers', 'es' => '+10000 Clientes'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-2-text',    
            ],
            [                
                'text' => ['en' => 'We pride ourselves in giving excellent customer service while providing new and reliable cars. Customers keep coming back due to our excellent knowledge of the local area.', 'es' => 'Nos enorgullecemos de brindar un excelente servicio al cliente mientras ofrecemos autos nuevos y confiables. Los clientes siguen regresando debido a nuestro excelente conocimiento del área local.'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-3-title',    
            ],
            [                
                'text' => ['en' => '24H Support', 'es' => 'Soporte 24H'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-3-text',    
            ],
            [                
                'text' => ['en' => "Got any questions or need an answer about something that's not even related to the car hire? We are are available 24/7 to answer any questions about your trip!", 'es' => '¿Tiene alguna pregunta o necesita una respuesta sobre algo que ni siquiera está relacionado con el alquiler de coches? ¡Estamos disponibles las 24 horas del día, los 7 días de la semana para responder cualquier pregunta sobre su viaje!'],
            ]
        ); 
    }
}
