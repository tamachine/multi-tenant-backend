<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogTag;
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

        // Create 5 tags
        for ($i = 1; $i <= 5; $i++) {
            BlogTag::factory()->create();
        }

        //Create 5 authors
        for ($i = 1; $i <= 5; $i++) {
            BlogAuthor::factory()->create();
        }

        //Create 20 posts
        for ($i = 1; $i <= 20; $i++) {
            $post = BlogPost::factory()->create();  
            
            sleep(1); //for published_at time

            $post->tags()->attach(BlogTag::inRandomOrder()->take(3)->pluck('id')->toArray());

            $post->featured_image = $post->addImage('https://picsum.photos/id/'. rand(0,200). '/1436/960', '');

            $post->save();
            
        }
    }
}
