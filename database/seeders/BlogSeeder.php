<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogAuthor;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Create 5 categories
        for ($i = 1; $i <= 5; $i++) {
            BlogCategory::factory()->create();
        }

        //Create 5 authors
        for ($i = 1; $i <= 5; $i++) {
            BlogAuthor::factory()->create();
        }

        //Create 20 posts
        for ($i = 1; $i <= 20; $i++) {
            BlogPost::factory()->create();
        }
    }
}
