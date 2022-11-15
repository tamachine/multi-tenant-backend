<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {                    
        $this->call(Translations\Web\NavBarSeeder::class);        
        $this->call(Translations\Web\GeneralSeeder::class);        
        $this->call(Translations\Web\HomeSeeder::class);    
        $this->call(Translations\Web\CarSearchBarSeeder::class);    
        $this->call(Translations\Web\ReviewsSeeder::class);    
        $this->call(Translations\Web\DealsSeeder::class);   
        $this->call(Translations\Web\FooterSeeder::class);  
    }
}
