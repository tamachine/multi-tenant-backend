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

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.box2-h2-title',    
            ],
            [                
                'text' => ['en' => 'Explore our latest articles', 'es' => 'Explora nuestros últimos artículos'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.box2-h2-subtitle',    
            ],
            [                
                'text' => ['en' => 'to discover all guides and secrets in Iceland', 'es' => 'para descubrir todas las guías y secretos de Islandia'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-1-title',    
            ],
            [                
                'text' => ['en' => 'Tap Water in Iceland: Is it Safe?', 'es' => 'Agua del grifo en Islandia: ¿es segura?'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-1-text',    
            ],
            [                
                'text' => ['en' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all.", 'es' => "¿Es seguro beber agua del grifo en Islandia? ¿Y qué pasa con los rumores de un olor a azufre? Respondamos a estas preguntas de una vez por todas."],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-2-title',    
            ],
            [                
                'text' => ['en' => 'Driving Highland Road F208 in Iceland', 'es' => 'Conducir Highland Road F208 en Islandia'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-2-text',    
            ],
            [                
                'text' => ['en' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all.", 'es' => "¿Es seguro beber agua del grifo en Islandia? ¿Y qué pasa con los rumores de un olor a azufre? Respondamos a estas preguntas de una vez por todas."],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-3-title',    
            ],
            [                
                'text' => ['en' => "Seljalandsfoss Waterfall: Iceland's Beauty", 'es' => "Cascada de Seljalandsfoss: la belleza de Islandia"],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-3-text',    
            ],
            [                
                'text' => ['en' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all.", 'es' => "¿Es seguro beber agua del grifo en Islandia? ¿Y qué pasa con los rumores de un olor a azufre? Respondamos a estas preguntas de una vez por todas."],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-1-time',    
            ],
            [                
                'text' => ['en' => "2 Minutes", 'es' => '2 Minutos'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-2-time',    
            ],
            [                
                'text' => ['en' => "2 Minutes", 'es' => '2 Minutos'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-3-time',    
            ],
            [                
                'text' => ['en' => "2 Minutes", 'es' => '2 Minutos'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.faqs-title',    
            ],
            [                
                'text' => ['en' => "Frequently asked questions", 'es' => 'Preguntas frecuentes'],
            ]
        ); 

        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.faqs-subtitle',    
            ],
            [                
                'text' => ['en' => "No worries we have you covered. Check in here for answers to top questions. Remember, we love traveling through beautiful, wild and wonderful Iceland!", 'es' => "No se preocupe, lo tenemos cubierto. Consulte aquí para obtener respuestas a las principales preguntas. Recuerda, ¡nos encanta viajar por la hermosa, salvaje y maravillosa Islandia!"],
            ]
        );     
        
        LanguageLine::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.faqs-view-all',    
            ],
            [                
                'text' => ['en' => "View all questions", "es" => "Ver todas las preguntas"],
            ]
        );  
    }
}
