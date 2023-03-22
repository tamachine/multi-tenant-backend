<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogCategory::class;

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
