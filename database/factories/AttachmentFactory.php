<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->numberBetween(1, 20),
            'name' => $this->faker->userName(),
            'source' => $this->faker->imageUrl(),
            'mimetype' => $this->faker->mimeType(),
            'filesize' => $this->faker->numberBetween(100000, 1286000)
        ];
    }
}
