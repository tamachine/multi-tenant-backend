<?php

namespace Database\Factories;

use App\Models\BlogTag;
use Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->text(10);
        $name = mb_substr($name, 0, -1);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
