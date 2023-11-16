<?php
namespace Database\Seeders\MotorhomeIceland\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class LandingInsurancesSeeder extends Seeder
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
                'group' => 'landing-insurances',
                'key' => 'title',
            ],
            [
                'text' => ['en' => "Protect the car and save your trip ", 'es' => "Protege el coche y tu viaje"],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-insurances',
                'key' => 'subtitle',
            ],
            [
                'text' => ['en' => "Accidents and incidents can never be predicted, which is why it is important to be insured against most eventualities.", 'es' => "Los accidentes e incidentes nunca se pueden predecir, por lo que es importante estar asegurado."],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-insurances',
                'key' => 'grid-title',
            ],
            [
                'text' => ['en' => "Our insurances", 'es' => "Nuestros seguros"],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-insurances',
                'key' => 'grid-text-1',
                'rich' => true,
            ],
            [
                'text' => ['en' => "All of our rental vehicles come with Third Party Liability Insurance, Collision Damage Waiver, Super Collision Damage Waiver, Theft Protect and with 150.000 ISK excess/driver liability (Silver Package).<br>
                We strongly recommend you add extended coverage to reduce your liability. Take into consideration that Iceland is prone to extreme weather conditions and gravel road which can cause damage to your hire car. ", 'es' => "Todos nuestros vehículos de alquiler vienen con seguro de responsabilidad civil frente a terceros, exención de daños por colisión, exención de daños por súper colisión, protección contra robo y 150 000 ISK de franquicia/responsabilidad del conductor (paquete plata).
                Le recomendamos enfáticamente que agregue cobertura extendida para reducir su responsabilidad. Tenga en cuenta que Islandia es propensa a condiciones climáticas extremas y caminos de grava que pueden causar daños a su coche de alquiler."],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-insurances',
                'key' => 'grid-text-2',
                'rich' => true,
            ],
            [
                'text' => [
                    'en' => "We strongly recommend you add extended coverage to reduce your liability. Take into consideration that Iceland is prone to extreme weather conditions and gravel road which can cause damage to your hire car. Without insurance, you would have to pay for this damage out of your own pocket.
                    <br><br>
                    If you are insured through a third party insurance provider, such as a credit card or insurance company, you will first pay Lotus car rental for any damage and then get reimbursed through your insurance provider. Adding the insurance below will lower your deductible to 65.000 ISK (Gold Package) or 0 ISK (Platinum Package).
                    <br><br>
                    If you are not prepared to make this decision now, you can always add insurance when you pick up the car. The price is the same whether you book at the counter or online.", 
                    
                    'es' => "We strongly recommend you add extended coverage to reduce your liability. Take into consideration that Iceland is prone to extreme weather conditions and gravel road which can cause damage to your hire car. Without insurance, you would have to pay for this damage out of your own pocket.
                    <br><br>
                    If you are insured through a third party insurance provider, such as a credit card or insurance company, you will first pay Lotus car rental for any damage and then get reimbursed through your insurance provider. Adding the insurance below will lower your deductible to 65.000 ISK (Gold Package) or 0 ISK (Platinum Package).
                    <br><br>
                    If you are not prepared to make this decision now, you can always add insurance when you pick up the car. The price is the same whether you book at the counter or online.",
                ],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-insurances',
                'key' => 'features-title',
            ],
            [
                'text' => ['en' => "About insurances", 'es' => "Sobre seguros"],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-insurances',
                'key' => 'features-subtitle',
            ],
            [
                'text' => ['en' => "Get all details about each package", 'es' => "Descubre los detalles de cada paquete"],
            ]
        );

        Translation::firstOrCreate(
            [
                'group' => 'landing-insurances',
                'key' => 'features-load-more-button',
            ],
            [
                'text' => ['en' => "Load more", 'es' => "Cargar más"],
            ]
        );
    }
}