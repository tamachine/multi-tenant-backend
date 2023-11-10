<?php

namespace Database\Seeders\IcelandCars;

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
            'name' => [
                'en' => "Amendments on my booking",
                'es' => "Modificaciones en mi reserva"
            ],            
        ]);

        ContactUserDetailsType::create([
            'name' => [
                'en' => "Booking cancellation",
                'es' => "Cancelación de reserva"
            ],            
        ]);

        ContactUserDetailsType::create([
            'name' => [
                'en' => "Make a new booking / Get a quote",
                'es' => "Hacer una nueva reserva/ obtener un presupuesto"
            ],            
        ]);

        ContactUserDetailsType::create([
            'name' => [
                'en' => "Road assistance and travel support",
                'es' => "Asistencia en carretera y apoyo en viaje"
            ],            
        ]);
        
        ContactUserDetailsType::create([
            'name' => [
                'en' => "Insurance information",
                'es' => "Información del seguro"
            ],            
        ]);

        ContactUserDetailsType::create([
            'name' => [
                'en' => "Pick up or drop off information",
                'es' => "Información sobre recogida o entrega del vehículo"
            ],            
        ]);

        ContactUserDetailsType::create([
            'name' => [
                'en' => "Other",
                'es' => "Otro"
            ],            
        ]);            
        
    }

}


