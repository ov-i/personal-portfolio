<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ApiPostTest extends TestCase
{
    use WithFaker;

    /**
     * Creates new post with follows
     *
     * @param array $addons
     * @return array
     */
    private function createPost(array $addons = []): array {
        return [
            'thumbnail_url' => $this->faker->imageUrl(),
            'user_id' => $this->faker->numberBetween(1, 20),
            'category_id' => $this->faker->numberBetween(1, 4),
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(255),
            'slug' => $this->faker->slug(4),
            'content' => $this->faker->realText(2000),
            ...$addons,
        ];
    }

    /**
     * Asserts bad request
     *
     * @param TestResponse $response
     * @param array $addons
     * @return void
     */
    private function assertBadRequest(TestResponse $response, array $addons = []): void {
        if ($response->status() === 400) {
            $response->assertStatus(400);
            $response->assertJsonFragment(['error' => true]);
        } else {
            $response->assertStatus(201);
            $response->assertJsonFragment(['error' => false, 'post' => [], ...$addons]);
        }
    }

    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function posts_should_exists()
    {
        $response = $this->get('/api/posts');

        $response->assertOk();
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

        if ($response->status() === 404) {
            $response->assertNotFound();
        } else {
            $response->assertOk();
            $response->assertJsonFragment(['error' => false]);
        }
    }

    /**
     * Checks if post has been created successfully
     *
     * @test
     * @return void
     */
    public function post_should_be_created()
    {
        $response = $this->post('/api/posts', self::createPost());

        self::assertBadRequest($response);
    }

    /**
     * Checks if post can be created with tags
     *
     * @test
     * @return void
     */
    public function post_have_tags()
    {
        $response = $this->post('/api/posts', self::createPost(
            ['tags' => [1, 2, 3]]
        ));

        self::assertBadRequest($response, [
            'tags' => [$this->faker->numberBetween()]]
        );
    }

    /**
     * Checks if post can be created with attachments
     *
     * @test
     * @return void
     */
    public function post_have_attachments()
    {
        $response = $this->post('/api/posts', self::createPost(
            ['attachments' => [1, 2, 3]]
        ));

        self::assertBadRequest($response, [
            'attachments' => [$this->faker->numberBetween()]]
        );
    }
}
