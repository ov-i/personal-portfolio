<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_name' => Str::random(10),
            'language' => Str::random(3),
            'repository_url' => "https://github.com/".$this->faker->userName().'/'.$this->faker->slug(4),
            'description' => $this->faker->text(),
            'website_url' => $this->faker->url(),
            'project_status' => $this->faker->numberBetween(0, 100),
        ];
    }
}
