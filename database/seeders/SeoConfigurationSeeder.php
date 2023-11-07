<?php

namespace Database\Seeders;

use App\Models\Page;
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
        $page = Page::where('route_name', 'home')->first();

        foreach(Page::all() as $page) {

            if($page->route_name == 'home') {
                $title = [
                    'en' => 'Iceland Car Rental ▷ Cheapest Car Hire in Reykjavik Top❶ 2023',
                    'es' => 'Alquiler de coches en Islandia ▷ El alquiler de coches más barato en Reikiavik Top❶ 2023'
                ];
            } else {
                $title = [
                    'en' => 'Iceland Car Rental',
                    'es' => 'Alquiler de coches en Islandia'
                ];
            }

            $seoConfiguration = new SeoConfiguration([
                'meta_title' => $title,
                'meta_description' => $title,
                'page_id' => $page->id
            ]);

            $seoConfiguration->instance()->associate($page);
            $seoConfiguration->save();
        }
    }
}
