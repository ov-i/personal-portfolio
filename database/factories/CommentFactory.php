<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author' => $this->faker->userName(),
            'post_id' => $this->faker->numberBetween(1, 20),
            'comment' => $this->faker->text(300),
            'published' => $this->faker->boolean(45),
        ];
    }
}
