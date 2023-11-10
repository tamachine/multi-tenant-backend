<?php

namespace Database\Seeders\MotorhomeIceland;

use Illuminate\Database\Seeder;
use RoutesForPages;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoutesForPages::storeRoutes();
    }
}