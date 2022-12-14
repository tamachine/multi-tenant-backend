<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class HomeSeeder extends Seeder
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
                'group' => 'web',
                'key' => 'home.title',    
            ],
            [                
                'text' => ['en' => 'A road ready for you', 'es' => 'Un camino listo para ti'],
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.subtitle',    
            ],
            [                
                'text' => ['en' => 'The best car rental in Iceland', 'es' => 'El mejor alquiler de coches en Islandia'],
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.box1-h2-title',    
            ],
            [                
                'text' => ['en' => 'Best way to find your perfect car in Iceland', 'es' => 'La mejor forma de encontrar el coche perfecto en Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.box1-h2-subtitle',    
            ],
            [                
                'text' => ['en' => 'We are locals and treat each customer to our acquired expertise and knowledge that is unsurpassed by any other car rental in Iceland.', 'es' => 'Somos locales y tratamos a cada cliente con nuestra experiencia y conocimiento adquiridos que no tienen comparación con ningún otro alquiler de autos en Islandia.'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-1-title',    
            ],
            [                
                'text' => ['en' => '+30 Premium cars', 'es' => '+30 Coches premium'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-1-text',    
            ],
            [                
                'text' => ['en' => "We have a grand selection of high quality vehicles for your next trip to Iceland. Depending on your type of trip whether you're here on business or for pleasure—we've got you covered!", 'es' => "Tenemos una gran selección de vehículos de alta calidad para su próximo viaje a Islandia. Dependiendo de su tipo de viaje, ya sea que esté aquí por negocios o por placer, ¡lo tenemos cubierto!"],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-2-title',    
            ],
            [                
                'text' => ['en' => '+10000 Customers', 'es' => '+10000 Clientes'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-2-text',    
            ],
            [                
                'text' => ['en' => 'We pride ourselves in giving excellent customer service while providing new and reliable cars. Customers keep coming back due to our excellent knowledge of the local area.', 'es' => 'Nos enorgullecemos de brindar un excelente servicio al cliente mientras ofrecemos autos nuevos y confiables. Los clientes siguen regresando debido a nuestro excelente conocimiento del área local.'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-3-title',    
            ],
            [                
                'text' => ['en' => '24H Support', 'es' => 'Soporte 24H'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-default-3-text',    
            ],
            [                
                'text' => ['en' => "Got any questions or need an answer about something that's not even related to the car hire? We are are available 24/7 to answer any questions about your trip!", 'es' => '¿Tiene alguna pregunta o necesita una respuesta sobre algo que ni siquiera está relacionado con el alquiler de coches? ¡Estamos disponibles las 24 horas del día, los 7 días de la semana para responder cualquier pregunta sobre su viaje!'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.box2-h2-title',    
            ],
            [                
                'text' => ['en' => 'Explore our latest articles', 'es' => 'Explora nuestros últimos artículos'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.box2-h2-subtitle',    
            ],
            [                
                'text' => ['en' => 'to discover all guides and secrets in Iceland', 'es' => 'para descubrir todas las guías y secretos de Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-1-title',    
            ],
            [                
                'text' => ['en' => 'Tap Water in Iceland: Is it Safe?', 'es' => 'Agua del grifo en Islandia: ¿es segura?'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-1-text',    
            ],
            [                
                'text' => ['en' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all.", 'es' => "¿Es seguro beber agua del grifo en Islandia? ¿Y qué pasa con los rumores de un olor a azufre? Respondamos a estas preguntas de una vez por todas."],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-2-title',    
            ],
            [                
                'text' => ['en' => 'Driving Highland Road F208 in Iceland', 'es' => 'Conducir Highland Road F208 en Islandia'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-2-text',    
            ],
            [                
                'text' => ['en' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all.", 'es' => "¿Es seguro beber agua del grifo en Islandia? ¿Y qué pasa con los rumores de un olor a azufre? Respondamos a estas preguntas de una vez por todas."],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-3-title',    
            ],
            [                
                'text' => ['en' => "Seljalandsfoss Waterfall: Iceland's Beauty", 'es' => "Cascada de Seljalandsfoss: la belleza de Islandia"],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-3-text',    
            ],
            [                
                'text' => ['en' => "Is it safe to drink tap water in Iceland? And what about rumors of a sulphur smell? Let's answer these questions once and for all.", 'es' => "¿Es seguro beber agua del grifo en Islandia? ¿Y qué pasa con los rumores de un olor a azufre? Respondamos a estas preguntas de una vez por todas."],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-1-time',    
            ],
            [                
                'text' => ['en' => "2 Minutes", 'es' => '2 Minutos'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-2-time',    
            ],
            [                
                'text' => ['en' => "2 Minutes", 'es' => '2 Minutos'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.card-elongated-3-time',    
            ],
            [                
                'text' => ['en' => "2 Minutes", 'es' => '2 Minutos'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.faqs-title',    
            ],
            [                
                'text' => ['en' => "Frequently asked questions", 'es' => 'Preguntas frecuentes'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.faqs-subtitle',    
            ],
            [                
                'text' => ['en' => "No worries we have you covered. Check in here for answers to top questions. Remember, we love traveling through beautiful, wild and wonderful Iceland!", 'es' => "No se preocupe, lo tenemos cubierto. Consulte aquí para obtener respuestas a las principales preguntas. Recuerda, ¡nos encanta viajar por la hermosa, salvaje y maravillosa Islandia!"],
            ]
        );     
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.faqs-view-all',    
            ],
            [                
                'text' => ['en' => "View all questions", "es" => "Ver todas las preguntas"],
            ]
        );   
        
        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.why-iceland-title',    
            ],
            [                
                'text' => ['en' => "Why Iceland?", "es" => "¿Por qué Islandia?"],
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.why-iceland-text',    
            ],
            [                
                'text' => [
                    'en' => "While many travelers love to chase the sun and the hustle and bustle of major cities, there are others looking for a more relaxed vacation in a cooler climate. Iceland may be the most sparsely populated country in Europe, but it is also a place that is drawing a lot of attention from tourists looking for a new place to explore.<br><br>Some of the most spectacular natural wonders in the world can be found there, and the small population means that it never feels overcrowded. Getting around can be tough due to the lack of public transport to the remote areas, which is why a car hire in Iceland is such a good idea.", 
                    "es" => "Mientras que a muchos viajeros les encanta perseguir el sol y el ajetreo y el bullicio de las principales ciudades, hay otros que buscan unas vacaciones más relajadas en un clima más fresco. Islandia puede ser el país menos poblado de Europa, pero también es un lugar que está atrayendo mucho la atención de los turistas que buscan un nuevo lugar para explorar.<br><br>Algunas de las maravillas naturales más espectaculares del mundo se pueden encontrar allí, y la pequeña población significa que nunca se siente abarrotado. Moverse puede ser difícil debido a la falta de transporte público a las zonas remotas, por lo que alquilar un coche en Islandia es una buena idea."
                ],
                'rich' => true
            ]
        );   

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.feature-more',    
            ],
            [                
                'text' => [
                    'en' => "Learn more", 
                    "es" => "Aprender más"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.feature-1-title',    
            ],
            [                
                'text' => [
                    'en' => "Pick ups & Drop offs", 
                    "es" => "Recogidas y entregas"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.feature-1-text',    
            ],
            [                
                'text' => [
                    'en' => "The great thing about renting a car in Iceland is that you will often feel as though you have the road to yourself. Even in the major cities, there aren’t any issues with traffic jams, making life on the road very comfortable indeed. You should be aware that you drive on the right side of the road in Iceland, so just keep that in mind if you come from a country where traffic is on the left.<br><br>To make things easy for drivers, there is a single, two-lane ring road that runs around Iceland, and which essentially takes you anywhere you want to go. You will of course have to take off-roads to visit attractions, but these are clearly marked and easy to navigate. If you are not sure about driving in snowy.", 
                    "es" => "Lo bueno de alquilar un automóvil en Islandia es que a menudo sentirás que tienes el camino para ti solo. Incluso en las principales ciudades, no hay ningún problema con los atascos de tráfico, lo que hace que la vida en la carretera sea muy cómoda. Debe tener en cuenta que conduce por el lado derecho de la carretera en Islandia, así que tenga esto en cuenta si viene de un país donde el tráfico es por la izquierda.<br><br>Para facilitar las cosas a los conductores, hay es una carretera de circunvalación única de dos carriles que recorre Islandia y que esencialmente te lleva a donde quieras ir. Por supuesto, tendrá que salir de la carretera para visitar las atracciones, pero están claramente señalizadas y son fáciles de navegar. Si no está seguro de conducir en nieve."
                ],
                'rich' => true,
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.feature-2-title',    
            ],
            [                
                'text' => [
                    'en' => "Driving in Iceland", 
                    "es" => "Conducir en Islandia"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.feature-2-text',    
            ],
            [                
                'text' => [
                    'en' => "The great thing about renting a car in Iceland is that you will often feel as though you have the road to yourself. Even in the major cities, there aren’t any issues with traffic jams, making life on the road very comfortable indeed. You should be aware that you drive on the right side of the road in Iceland, so just keep that in mind if you come from a country where traffic is on the left.<br><br>To make things easy for drivers, there is a single, two-lane ring road that runs around Iceland, and which essentially takes you anywhere you want to go. You will of course have to take off-roads to visit attractions, but these are clearly marked and easy to navigate. If you are not sure about driving in snowy and icy conditions, you may want to consider visiting in the summer months when.", 
                    "es" => "Lo bueno de alquilar un automóvil en Islandia es que a menudo sentirás que tienes el camino para ti solo. Incluso en las principales ciudades, no hay ningún problema con los atascos de tráfico, lo que hace que la vida en la carretera sea muy cómoda. Debe tener en cuenta que conduce por el lado derecho de la carretera en Islandia, así que tenga esto en cuenta si viene de un país donde el tráfico es por la izquierda.<br><br>Para facilitar las cosas a los conductores, hay es una carretera de circunvalación única de dos carriles que recorre Islandia y que esencialmente te lleva a donde quieras ir. Por supuesto, tendrá que salir de la carretera para visitar las atracciones, pero están claramente señalizadas y son fáciles de navegar. Si no está seguro de conducir en condiciones de nieve y hielo, es posible que desee considerar visitar en los meses de verano cuando."
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.testimonials-title',    
            ],
            [                
                'text' => [
                    'en' => "Customer satisfaction", 
                    "es" => "Testimonios"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.testimonials-text',    
            ],
            [                
                'text' => [
                    'en' => "We have compiled an impressive staff capable of servicing customers in 10 widely used international languages. You can feel comfortable in asking us anything about our vehicles, Iceland or telling us about your trip plans in your native tongue!", 
                    "es" => "Hemos reunido un personal impresionante capaz de atender a los clientes en 10 idiomas internacionales ampliamente utilizados. ¡Puede sentirse cómodo preguntándonos cualquier cosa sobre nuestros vehículos, Islandia o contándonos sus planes de viaje en su lengua materna!"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.testimonials-all',    
            ],
            [                
                'text' => [
                    'en' => "View all", 
                    "es" => "Ver todos"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-title',    
            ],
            [                
                'text' => [
                    'en' => "Main Location", 
                    "es" => "Ubicación principal"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-address',    
            ],
            [                
                'text' => [
                    'en' => "Hólmbergsbraut, 230 Keflavík", 
                    "es" => "Hólmbergsbraut, 230 Keflavík"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-time',    
            ],
            [                
                'text' => [
                    'en' => "5 minutes away", 
                    "es" => "A 5 minutos"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-phone',    
            ],
            [                
                'text' => [
                    'en' => "+354 539 0605", 
                    "es" => "+354 539 0605"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-email',    
            ],
            [                
                'text' => [
                    'en' => "info@reykjavikauto.com", 
                    "es" => "info@reykjavikauto.com"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-hours-title',    
            ],
            [                
                'text' => [
                    'en' => "We are always available for you", 
                    "es" => "Siempre disponibles"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-hours-monday',    
            ],
            [                
                'text' => [
                    'en' => "Monday - Open 24 hours", 
                    "es" => "Lunes - Abierto 24 horas"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-hours-tuesday',    
            ],
            [                
                'text' => [
                    'en' => "Tuesday - Open 24 hours", 
                    "es" => "Martes - Abierto 24 horas"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-hours-wednesday',    
            ],
            [                
                'text' => [
                    'en' => "Wednesday - Open 24 hours", 
                    "es" => "Miércoles - Abierto 24 horas"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-hours-thursday',    
            ],
            [                
                'text' => [
                    'en' => "Thursday - Open 24 hours", 
                    "es" => "Jueves - Abierto 24 horas"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-hours-friday',    
            ],
            [                
                'text' => [
                    'en' => "Friday - Open 24 hours", 
                    "es" => "Viernes - Abierto 24 horas"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-hours-saturday',    
            ],
            [                
                'text' => [
                    'en' => "Saturday - Open 24 hours", 
                    "es" => "Sábado - Abierto 24 horas"
                ],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'web',
                'key' => 'home.location-map-hours-sunday',    
            ],
            [                
                'text' => [
                    'en' => "Sunday - Open 24 hours", 
                    "es" => "Domingo - Abierto 24 horas"
                ],
            ]
        ); 
    }
}
