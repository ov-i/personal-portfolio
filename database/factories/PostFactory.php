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
            'user_id' => 1,
            'category_id' => 1,
            'title' => $this->faker->text(100),
            'description' => $this->faker->text(),
            'content' => $this->faker->text(1000),
            'published' => $this->faker->boolean(45),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime()
        ];
    }
}
