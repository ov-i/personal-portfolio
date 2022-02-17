<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiPostTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_posts_should_exists()
    {
        $response = $this->get('/api/posts');

        $response->assertStatus($response->status());
    }

    /**
     * Checks if posts have some content in response
     *
     * @return void
     */
    public function test_posts_have_content()
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
}
