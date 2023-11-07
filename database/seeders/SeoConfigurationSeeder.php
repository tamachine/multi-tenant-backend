<?php

namespace Database\Seeders;

use App\Models\SeoConfiguration as SeoConfiguration;
use Illuminate\Database\Seeder;

class SeoConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeoConfiguration::create([
            'meta_title' => [
                'en' => 'Iceland Car Rental ▷ Cheapest Car Hire in Reykjavik Top❶ 2023',
                'es' => 'Alquiler de coches en Islandia ▷ El alquiler de coches más barato en Reikiavik Top❶ 2023'
            ],            
            'instance_type' => 'App\Models\Page',
            'instance_id' => 1,
            'page_id' => 1
        ]);
    }
}
