<?php

namespace Database\Seeders;

use App\Models\ContactUserDetailsType;
use Illuminate\Database\Seeder;

class ContactUserDetailsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ContactUserDetailsType::create([
            'type' => json_encode([
                'en' => "Amendments on my booking",
                'es' => "Modificaciones en mi reserva"
            ]),            
        ]);

        ContactUserDetailsType::create([
            'type' => json_encode([
                'en' => "Booking cancellation",
                'es' => "Cancelación de reserva"
            ]),            
        ]);

        ContactUserDetailsType::create([
            'type' => json_encode([
                'en' => "Make a new booking / Get a quote",
                'es' => "Hacer una nueva reserva/ obtener un presupuesto"
            ]),            
        ]);

        ContactUserDetailsType::create([
            'type' => json_encode([
                'en' => "Road assistance and travel support",
                'es' => "Asistencia en carretera y apoyo en viaje"
            ]),            
        ]);
        
        ContactUserDetailsType::create([
            'type' => json_encode([
                'en' => "Insurance information",
                'es' => "Información del seguro"
            ]),            
        ]);

        ContactUserDetailsType::create([
            'type' => json_encode([
                'en' => "Pick up or drop off information",
                'es' => "Recoger o dejar información"
            ]),            
        ]);

        ContactUserDetailsType::create([
            'type' => json_encode([
                'en' => "Other",
                'es' => "Otro"
            ]),            
        ]);            
        
    }

}


