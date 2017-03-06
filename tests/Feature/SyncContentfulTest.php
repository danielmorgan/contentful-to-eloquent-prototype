<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SyncContentfulTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function importing_posts_from_contentful()
    {
        $response = $this->json('POST', '/sync/posts');

        $response->assertStatus(201);
        $this->assertNotEmpty(Post::all());
        $this->assertInternalType('string', Post::first()->title);
    }

    /** @test */
    function can_view_posts()
    {
        $post = factory(Post::class)->create([
            'title' => 'This is the title',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($post->title);
        $response->assertSee($post->body);
    }
}
