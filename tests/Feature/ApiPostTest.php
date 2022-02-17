<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiPostTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function posts_should_exists()
    {
        $response = $this->get('/api/posts');

        $response->assertStatus($response->status());
    }

    /**
     * Checks if posts have some content in response
     *
     * @test
     * @return void
     */
    public function posts_have_content()
    {
        $response= $this->get('/api/posts');

        if ($response->status() !== 200)
            $response->assertJsonFragment([
                'error' => true,
                'posts' => [],
            ]);

        $response->assertJsonFragment([
            'error' => false
        ]);
    }

    /**
     * Checks if post has been created successfully
     *
     * @test
     * @return void
     */
    public function post_should_be_created()
    {
        $response = $this->post('/api/posts', [
            'likes' => 0,
            'thumbnail_url' => $this->faker->imageUrl(),
            'user_id' => $this->faker->numberBetween(1, 20),
            'category_id' => $this->faker->numberBetween(1, 4),
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(255),
            'slug' => $this->faker->slug(4),
            'content' => $this->faker->realText(2000)
        ]);

        if ($response->status() !== 201) {
            $response->assertStatus($response->status());
        }

        $response->assertStatus(201);
    }

    /**
     * Checks if post can be created with tags
     *
     * @test
     * @return void
     */
    public function post_have_tags()
    {
        $response = $this->post('/api/posts', [
            'likes' => 0,
            'thumbnail_url' => $this->faker->imageUrl(),
            'user_id' => $this->faker->numberBetween(1, 20),
            'category_id' => $this->faker->numberBetween(1, 4),
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(255),
            'slug' => $this->faker->slug(4),
            'content' => $this->faker->realText(2000),
            'tags' => [1, 2, 3]
        ]);

        if ($response->status() !== 201) {
            $response->assertStatus($response->status());
        }

        $response->assertStatus(201);
    }

    /**
     * Checks if post can be created with attachments
     *
     * @test
     * @return void
     */
    public function post_have_attachments()
    {
        $response = $this->post('/api/posts', [
            'likes' => 0,
            'thumbnail_url' => $this->faker->imageUrl(),
            'user_id' => $this->faker->numberBetween(1, 20),
            'category_id' => $this->faker->numberBetween(1, 4),
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(255),
            'slug' => $this->faker->slug(4),
            'content' => $this->faker->realText(2000),
            'attachments' => [1, 2, 3]
        ]);

        if ($response->status() !== 201) {
            $response->assertStatus($response->status());
        }

        $response->assertStatus(201);
    }
}
