<?php

namespace Database\Seeders\MotorhomeIceland\Translations\Web;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class InsurancesSeeder extends Seeder
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
                'group' => 'insurances',
                'key' => 'title',    
            ],
            [                
                'text' => ['en' => 'Simple and transparent insurance pricing', 'es' => 'Precios de seguros simples y transparentes'],
            ]
        ); 
        
        Translation::firstOrCreate(
            [
                'group' => 'insurances',
                'key' => 'table-title',    
            ],
            [                
                'text' => ['en' => 'Free cancellation', 'es' => 'Cancelación gratuita'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'insurances',
                'key' => 'table-subtitle',    
            ],
            [                
                'text' => ['en' => '(Up to 48 hours before)', 'es' => '(Hasta 48 horas antes)'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'insurances',
                'key' => 'price_mode.per_day',    
            ],
            [                
                'text' => ['en' => 'per day', 'es' => 'por día'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'insurances',
                'key' => 'price_mode.per_rental',    
            ],
            [                
                'text' => ['en' => 'per rental', 'es' => 'por alquiler'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'insurances',
                'key' => 'btn-text',    
            ],
            [                
                'text' => ['en' => 'Choose insurance', 'es' => 'Escoger seguro'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'insurances',
                'key' => 'view-all',    
            ],
            [                
                'text' => ['en' => 'View all details', 'es' => 'Ver todos los detalles'],
            ]
        ); 

        Translation::firstOrCreate(
            [
                'group' => 'insurances',
                'key' => 'hide-all',    
            ],
            [                
                'text' => ['en' => 'Hide all details', 'es' => 'Ocultar todos los detalles'],
            ]
        ); 
    }
}
