<?php

namespace Database\Seeders\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class AboutSeeder extends Seeder
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
                'group' => 'about',
                'key' => 'title',
            ],
            [
                'text' => ['en' => 'Serving international customers with local hospitality', 'es' => 'Atendiendo a clientes internacionales con hospitalidad local'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'intro',
            ],
            [
                'text' => ['en' => 'For more than 9 years, we have been providing customers from all over the world with superb service, amazing offers and quality vehicles. We don\'t believe in soulless algorithms. We have an entire locally based support staff to answer any of your questions, at any time of the day. Iceland is a beautiful spot for your next vacation and who better to rent your next vehicle with than a company with a proven track record in helping travelers with their next adventure trip through our inspiring country.', 'es' => 'Llevamos más de 9 años ofreciendo a clientes de todo el mundo un servicio inmejorable, ofertas increíbles y vehículos de calidad. No creemos en algoritmos sin alma. Contamos con todo un equipo de asistencia local para responder a cualquiera de sus preguntas, a cualquier hora del día. Islandia es un hermoso lugar para sus próximas vacaciones y quién mejor para alquilar su próximo vehículo que una empresa con un historial probado en ayudar a los viajeros con su próximo viaje de aventura a través de nuestro inspirador país.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'why',
            ],
            [
                'text' => ['en' => 'Why Reykjavik Auto?', 'es' => '¿Por qué Reykjavik Autod?'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'why-reply',
            ],
            [
                'text' => ['en' => 'We understand there are many car rental companies worldwide and online. However, the reason why we began Reykjavík Auto was to give renters customized service with a personal touch. Since we too are travelers, we have found that not only is price important when booking online, but expert responses to questions about terrain, car performance in specific weather and grass roots knowledge of the best places to visit while on your trip.', 'es' => 'Entendemos que hay muchas empresas de alquiler de coches en todo el mundo y en línea. Sin embargo, la razón por la que creamos Reykjavik Auto fue para ofrecer a los arrendatarios un servicio personalizado con un toque personal. Como nosotros también somos viajeros, nos hemos dado cuenta de que no solo el precio es importante a la hora de reservar online, sino también las respuestas expertas a preguntas sobre el terreno, el rendimiento del coche en condiciones meteorológicas específicas y el conocimiento básico de los mejores lugares para visitar durante el viaje.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'our-past',
            ],
            [
                'text' => ['en' => 'Our past.', 'es' => 'Nuestro pasado.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'our-present',
            ],
            [
                'text' => ['en' => 'Our present.', 'es' => 'Nuestro presente.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'our-future',
            ],
            [
                'text' => ['en' => 'Our future.', 'es' => 'Nuestro futuro.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'our-text',
            ],
            [
                'text' => [
                    'en' => 'Reykjavik Auto was born out of a need. The founders are avid adventure travelers and always felt unsatisfied with their car rental experience while traveling abroad. Knowing what car to rent during a specific season in a place like Iceland is something that only someone who has driven through that terrain would know best.<br><br>Winter winds, ice roads and hillside paths are all variables that need to be addressed when booking a car. So, they decided to start a locally owned company to service the needs of other travelers visiting Iceland.<br><br>We have local experts just a phone call away that not only will help you with your car rental but will provide you unique knowledge about the type of car you\'ll need for the appropriate weather and terrain.',
                    'es' => 'Reykjavik Auto nació de una necesidad. Los fundadores son ávidos viajeros de aventura y siempre se sintieron insatisfechos con su experiencia de alquiler de coches cuando viajaban al extranjero. Saber qué coche alquilar durante una temporada concreta en un lugar como Islandia es algo que sólo alguien que haya conducido por ese terreno sabría hacer mejor.<br><br>Los vientos invernales, las carreteras heladas y los caminos por laderas son variables que hay que tener en cuenta a la hora de reservar un coche. Así que decidieron crear una empresa local para atender las necesidades de otros viajeros que visiten Islandia. <br><br>Tenemos expertos locales a sólo una llamada de distancia que no sólo le ayudarán con el alquiler de su coche, sino que le proporcionarán conocimientos únicos sobre el tipo de coche que necesitará para el clima y el terreno apropiados.'
                ],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'likes-title',
            ],
            [
                'text' => ['en' => 'What customers have liked about us in the past', 'es' => 'Lo que a los clientes les ha gustado de nosotros en el pasado'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'likes-text-1',
            ],
            [
                'text' => ['en' => 'New cars. Superior vehicle maintenance. 24 Hour Road Assistance Program.', 'es' => 'Vehículos nuevos. Mantenimiento superior del vehículo. Programa de Asistencia en Carretera 24 Horas.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'likes-text-2',
            ],
            [
                'text' => ['en' => '24/7 Customer Service Center staffed with locals to answer any questions or concerns.', 'es' => 'Centro de atención al cliente las 24 horas, los 7 días de la semana, con personal local para responder cualquier pregunta o inquietud.'],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'about',
                'key' => 'likes-text-3',
            ],
            [
                'text' => ['en' => 'Working closely with customers to coordinate pick up and drop-off to better suit their needs.', 'es' => 'Trabajando en estrecha colaboración con los clientes para coordinar la recogida y devolución para satisfacer mejor sus necesidades.'],
            ]
        );
    }
}
