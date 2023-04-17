<?php

namespace Database\Factories;

use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon; 

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title =  $this->faker->text(30);
        $published = rand(0,1);

        return [
            'title' => $title,
            'slug' => Str::slug($title),            
            'published_at' => rand(0,1) ? Carbon::today()->subDays(rand(0, 180)) : Carbon::today()->addDays(rand(1, 180)),
            'summary' => $this->faker->text(200),
            'content' => $this->faker->text(1000),
            'blog_author_id' => BlogAuthor::inRandomOrder()->first(),
            'blog_category_id' => BlogCategory::inRandomOrder()->first(),
            'featured_image' => 'https://picsum.photos/id/'. rand(0,200). '/1436/960',
            'hero' => rand(0,1),
            'top' => rand(0,1)
        ];
    }
}
