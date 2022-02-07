<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'thumbnail_url' => $this->faker->imageUrl('1860', '1240', 'office'),
            'user_id' => $this->faker->numberBetween(1, 20),
            'category_id' => $this->faker->numberBetween(1, 3),
            'title' => $this->faker->realTextBetween(1, 30),
            'slug' => $this->faker->slug(3),
            'description' => $this->faker->text(),
            'content' => $this->faker->sentences(100, true),
            'published' => $this->faker->boolean(45),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime()
        ];
    }
}
