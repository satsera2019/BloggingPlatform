<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogPostCreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_blog_post()
    {
        $this->withoutExceptionHandling();

        // Create a user for testing purposes
        $user = User::create();

        // Simulate login for the user
        $this->actingAs($user);

        // Data to create a blog post
        $postData = [
            'title' => 'Sample Blog Post',
            'content' => 'This is the content of the blog post.',
        ];

        // Send a POST request to create a new blog post
        $response = $this->post('/blogs/store', $postData);

        // Check if the blog post was created successfully
        $response->assertStatus(302); // Assuming it redirects to another page after creating
        $this->assertDatabaseHas('blog_posts', $postData);
    }
}
