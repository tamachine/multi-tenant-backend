<?php

namespace Database\Factories;

use App\Models\BlogAuthor;
use Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogAuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogAuthor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name =  $this->faker->name;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'bio' => $this->faker->text(300),
            'short_bio' => $this->faker->text(100),
        ];
    }
}
